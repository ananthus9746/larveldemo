<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\PasswordReset;
use PHPMailer\PHPMailer;
use Carbon\Carbon;
use Auth;
use Image;
use View;

class AdminController extends Controller
{
    public function show_login_form()
    {
        $data = [];
        $data['remember_me'] = false;
        if (Cookie::has('remember_me')) {
            $remember_cookie = json_decode(Cookie::get('remember_me'));
            if (isset($remember_cookie[0])) {
                $remember_me_token = $remember_cookie[0];
                if(Admin::where('remember_me_token',$remember_me_token)->count() > 0) {
                    $admin = Admin::where('remember_me_token',$remember_me_token)->first();
                    if (strtotime($admin->remember_expiry) > time()) {
                        $data['remember_me'] = true;
                        $data['email'] = $admin->email;
                        $data['password'] = $remember_cookie[1];
                    }
                }
            }
        }
        return view('control-panel.auth.login', $data);
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::lower(request('email')) . '|' . request()->ip();
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     */
    public function checkTooManyFailedAttempts()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 30)) {
            return;
        }

        return true;
    }

    public function reset_limit()
    {
        RateLimiter::clear($this->throttleKey());
    }
    
    public function login(LoginRequest $request)
    {
        // $this->reset_limit();
        if ($this->checkTooManyFailedAttempts()) {
        
            return response()->json([
                'status' => 'error',
                'msg' => 'Too many login attempts. Please try again in a hour',
            ]);

        };

        $admin_logged = Auth::guard('admin')->attempt($request->only('email', 'password'));


        $admin = Auth::guard('admin')->user();

        if ($admin_logged && $admin) {
            $remember_me = $request->has('remember_me') ? true : false;
            if ($remember_me == true) {
                $remember_me_token = Str::random(60);
                $admin->remember_me_token = $remember_me_token;
                $admin->remember_expiry = date('Y-m-d H:i:s', time()+(60*60*24*30));
                $admin->save();
                $cookie_data = json_encode([$remember_me_token,$request->password]);
                Cookie::queue(Cookie::make('remember_me',$cookie_data,(60*24*30)));
            } else {
                $admin->remember_me_token = null;
                $admin->remember_expiry = null;
                $admin->save();
                Cookie::queue(Cookie::forget('remember_me'));
            }

            RateLimiter::clear($this->throttleKey());
            return response()->json(['status'=>'success','msg'=>'You are Logged in Successfully'], 200);
        } else {
            RateLimiter::hit($this->throttleKey(), $seconds = 3600);
            return response()->json(['status'=>'error','msg'=>'Provided Credentials are Wrong'], 400);
        }
    }

    public function show_forgot_password_form()
    {
        return view('control-panel.auth.forgot-password');
    }

    public function forgot_password(ForgotPasswordRequest $request)
    {
       
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if (!$validator->validated()) {
            return response()->json(['status'=>'error','msg'=>'Please fill the out the form'], 400);
        } else {

            $email = $request->email;
            $admin = Admin::where('email',$email)->first();

            if ($admin) {

                PasswordReset::where('email',$email)->delete();

                $token = Str::random(60);

                PasswordReset::create([
                    'email' => $email,
                    'admin_id' => $admin->id,
                    'token' => $token,
                ]);
                    
                $full_name = $admin->first_name.' '.$admin->last_name;
                
                $data = [];

                $data['link'] = url('control-panel/reset-password?token='.$token);

                $view = View::make('control-panel.email-templates.forgot-password',$data);
                $template = $view->render();

                $mail = new PHPMailer\PHPMailer(true);
                if (env('MAIL_DEBUG') === true) {
                    $mail->SMTPDebug = PHPMailer\SMTP::DEBUG_SERVER;  // Enable verbose debug output
                }
                if (env('MAIL_MAILER') === 'smtp') {
                    $mail->isSMTP();                                  // Send using SMTP
                    $mail->SMTPAuth   = env('MAIL_SMTPAuth');                         // Enable SMTP authentication
                }
                $mail->Host       = env('MAIL_NO_REPLY_HOST');                 // Set the SMTP server to send through
                $mail->Username   = env('MAIL_NO_REPLY_USERNAME');             // SMTP username
                $mail->Password   = env('MAIL_NO_REPLY_PASSWORD');             // SMTP password
                $mail->SMTPSecure = env('MAIL_ENCRYPTION');                   // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = env('MAIL_PORT');                         // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom(env('MAIL_NO_REPLY_FROM_ADDRESS'), env('MAIL_NO_REPLY_FROM_NAME'));
                $mail->addReplyTo($email, $full_name);

                $mail->addAddress($email, $full_name); //Add a recipient

                //Content
                $mail->isHTML(true); //Set email format to HTML
                $mail->Subject = 'From '.env('MAIL_NO_REPLY_FROM_NAME').' Forgot Password Page';
                $mail->Body    = $template;

                if($mail->send()) {
                    return response()->json(['status'=>'success','msg'=>'Reset Password Link has been sent to your Email Address.'], 200);
                } else {
                    return response()->json(['status'=>'error','msg'=>'Reset Password Link has been failed to sent'], 400);
                }
                
            } else {
                return response()->json(['status'=>'error','msg'=>'Email Address not Found'], 400);
            }
        }
    }

    public function show_reset_password_form(Request $request)
    {
        $token = $request->token;
        if (PasswordReset::where('token',$token)->count() === 0) {
            return redirect()->to('/control-panel/forgot-password')->with('status','error')->with('msg','The Reset Password Token is Invalid.');
        }
        if (PasswordReset::where('token',$token)->where('created_at','>',Carbon::now()->subHours(1))->count() === 0) {
            return redirect()->to('control-panel/forgot-password')->with('status','error')->with('msg','The Reset Password Token Expired. You can generate New Token from this Page.');
        }
        return view('control-panel.auth.reset-password', ['token'=>$token]);
    }

    public function reset_password(ResetPasswordRequest $request)
    {
        $token = $request->token;
        if (PasswordReset::where('token',$token)->count() === 0) {
            return response()->json(['status'=>'error', 'msg'=>'Your Reset Password Token not Found. Please go to Forgot Password Page and Try Again.'],400);
        }
        if (PasswordReset::where('token',$token)->where('created_at','>',Carbon::now()->subHours(1))->count() === 0) {
            return response()->json(['status'=>'error', 'msg'=>'Your Reset Password Token is Expired. Please go to Forgot Password Page and Try Again.'],400);
        }
        $password_reset = PasswordReset::where('token',$token)->first();

        $email = $password_reset->email;

        $admin = Admin::where('email',$email)->first();

        $admin->password = Hash::make($request->password);

        if ($admin->save()) {
            PasswordReset::where('email',$email)->delete();
            return response()->json(['status'=>'success', 'msg'=>'Your Password has been Reset.'],200);
        } else {
            return response()->json(['status'=>'error', 'msg'=>'Your Password has failed to Reset.'],400);
        }
    }
    
    public function show_profile_form()
    {
        return view('control-panel.profile');
    }

    public function change_profile_image(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if (!$validator->validated()) {
            return response()->json(['status'=> 'error', 'msg' => 'Please upload only image for Profile Image.'], 400);
        } else {
            $admin = auth('admin')->user();
            if ($files = $request->file('profile_image')) {
                $profile_image = $request->file('profile_image');
                $filename = \Illuminate\Support\Str::random(40).'.'.$profile_image->getClientOriginalExtension();
                $image = Image::make($profile_image->getRealPath());
                if ($image->width() > 300) {
                    $image->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }

                // $file_path = base_path('store\\').'profile-images\\' .$filename; for localhost
                $file_path = public_path('assets/img/users/').$filename; //  for live
                $profile_image = $filename;
                $image->save($file_path);
                $admin->profile_image = $profile_image;
                if ($admin->save()) {
                    return response()->json(['status'=> 'success', 'msg' => 'Your Profile Image has been Changed.'], 200);
                } else {
                    return response()->json(['status'=> 'error', 'msg' => 'Your Profile Image failed to Change.'], 400);
                }
            }
        }
    }

    public function update_profile(UpdateProfileRequest $request)
    {

        $admin = Auth::guard('admin')->user();
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;

        if ($admin->save()) {
            return response()->json(['status'=>'success', 'msg'=>'Your Profile has been updated'],200);
        } else {
            return response()->json(['status'=>'error', 'msg'=>'Profile failed to update'],400);
        }
    }
    
    public function show_change_password_form()
    {
        return view('control-panel.change-password');
    }

    public function change_password(ChangePasswordRequest $request)
    {
        if ($request->password !== $request->confirm_password) {
            return response()->json(['status'=>'error', 'msg'=>'The Confirm Password must match with New Password.'],400);
        }
        $admin = Auth::guard('admin')->user();
        if (!Hash::check( $request->old_password , $admin->password )) {
            return response()->json(['status'=>'error', 'msg'=>'The Old Password is Wrong.'],400);
        }
        $admin->password = bcrypt($request->password);

        if ($admin->save()) {
            return response()->json(['status'=>'success', 'msg'=>'Your Password is Successfully Changed.'],200);
        } else {
            return response()->json(['status'=>'error', 'msg'=>'Your Password Failed to change.'],400);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/control-panel/login');
    }

}
