<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\PasswordReset;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    public function login(Request $request) {

        $errorMsgs = [
            'email.required' => 'The Email Field is Required',
            'email.email' => "The Email must be a vaild Email",
            'password.required' => "The Password Field is Required",
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ],$errorMsgs);
        $validator->after(function ($validator) {
            if(!empty($validator->errors()->toArray())) {
                $validator->errors()->add('form', 'login');
            }
        });

        $validator->validate();

        $remember_me = $request->has('remember_me') ? true : false;
        $credentials = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();
            $user_id = $user->id;
            Auth::guard('admin')->logout();

            if ($remember_me == true) {
                $remember_me_token = \Illuminate\Support\Str::random(60);
                $user->remember_me_token = $remember_me_token;
                $user->remember_expiry = date('Y-m-d H:i:s', time()+(60*60*24*30));
                $user->save();
                $cookie_data = json_encode([$remember_me_token,$request->password]);
                Cookie::queue(Cookie::make('user_remember_me',$cookie_data,(60*24*30)));
            } else {
                $user->remember_me_token = null;
                $user->remember_expiry = null;
                $user->save();
                Cookie::queue(Cookie::forget('user_remember_me'));
            }
                
            if ($request->session()->has('anonymous_id')) {
                $anonymous_id = $request->session()->get('anonymous_id');
                $commentRows = \App\Models\PostComment::where('anonymous_id',$anonymous_id)->get()->all();

                foreach ($commentRows as $commentRow) {
                    $id = $commentRow->id;
                    $singleCommentRow = \App\Models\PostComment::find($id);
                    $singleCommentRow->name = null;
                    $singleCommentRow->email = null;
                    $singleCommentRow->user_id = $user_id;
                    $singleCommentRow->is_anonymous = 0;
                    $singleCommentRow->anonymous_id = null;
                    $singleCommentRow->save();
                }
                $request->session()->forget('anonymous_id');
                $request->session()->forget('name');
                $request->session()->forget('email');
            }
            return back()->with('status','success')->with('msg', 'You are Logged In Successfully.');
        }
        return back()->with('status','error')->with('form', 'login')->withInput($request->only('email'));
    }

    public function verify(Request $request)
    {
        return $request->user()->only('name', 'email');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $errorMsgs = [
            'name.required' => "The Name Field is Required",
            'email.required' => 'Please provide Email Address',
            'email.email' => "The Email must be a vaild Email",
            'password.required' => "The Password Field is Required",
            'password.confirmed' => "The Confirm Password Does not Match"
        ];

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ],$errorMsgs);

        $validator->after(function ($validator) {
            if(!empty($validator->errors()->toArray())) {
                $validator->errors()->add('form', 'create_account');
            }
        });

        return $validator->validate();
    }

    protected function create(Request $request)
    {
        $this->validator($request->all());

        $user_id = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_image' => 'default-user.png'
        ])->id;
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        
        return redirect()->to('/blog');
    }

    protected function update(Request $request)
    {
        
        if (empty($request->password) && empty($request->password_confirmation)) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:6|confirmed',
            ]);
        }
        $validator->after(function ($validator) {
            if(!empty($validator->errors()->toArray())) {
                $validator->errors()->add('form', 'update_account');
            }
        });

        $validator->validate();

        if (auth('admin')->check()) {
            $id = auth('admin')->user()->id;
            $user = Admin::find($id);
        } else {
            $id = Auth::user()->id;
            $user = User::find($id);
        }

        $user->name = $request->name;

        if ($request->hasFile('profile_image')) {
            $profile_image = $request->file('profile_image')->store('profile-images', 'public');
            $user->profile_image = $profile_image;
        }
        
        if (!empty($request->password) && !empty($request->password_confirmation)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return back()->with('status','success')->with('form', 'update_account');
    }

    public function forget_password(Request $request) {
        $email = $request->email;
        $errorMsgs = [
            'email.required' => 'The Email Field is Required',
            'email.email' => "The Email must be a vaild Email",
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
        ],$errorMsgs);

        $validator->validate();

        if (User::where('email',$email)->count() > 0) {

            $user = User::where('email',$email)->first();

            PasswordReset::where('email',$email)->delete();

            $token = \Illuminate\Support\Str::random(60);

            PasswordReset::create([
                'email' => $email,
                'user_id' => $user->id,
                'token' => $token,
            ]);
                                
            $mail = new PHPMailer\PHPMailer(true);
            // $mail->SMTPDebug = PHPMailer\SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.jannatdevelopers.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'no-reply@jannatdevelopers.com';                     //SMTP username
            $mail->Password   = '-g01pPlOl7sX';                               //SMTP password
            $mail->SMTPSecure = PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                   //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('no-reply@jannatdevelopers.com', 'Jannat Developers');

            $mail->addAddress($email, $user->name);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Password Reset From Jannat Developers';
            $mail->Body    = '<!DOCTYPE html>
                <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
                    <head>
                        <!-- NAME: 1 COLUMN -->
                        <!--[if gte mso 15]>
                        <xml>
                            <o:OfficeDocumentSettings>
                                <o:AllowPNG/>
                                <o:PixelsPerInch>96</o:PixelsPerInch>
                            </o:OfficeDocumentSettings>
                        </xml>
                        <![endif]-->
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Reset Your Lingo Password</title>
                        <!--[if !mso]>
                        <link href="https://fonts.googleapis.com/css?family=Asap:400,400italic,700,700italic" rel="stylesheet" type="text/css">
                        <![endif]-->
                        <style type="text/css">
                            @media only screen and (min-width:768px){
                            .templateContainer{
                            width:600px !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            body,table,td,p,a,li,blockquote{
                            -webkit-text-size-adjust:none !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            body{
                            width:100% !important;
                            min-width:100% !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            #bodyCell{
                            padding-top:10px !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            .mcnImage{
                            width:100% !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            .mcnCaptionTopContent,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer{
                            max-width:100% !important;
                            width:100% !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            .mcnBoxedTextContentContainer{
                            min-width:100% !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            .mcnImageGroupContent{
                            padding:9px !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            .mcnCaptionLeftContentOuter
                            .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{
                            padding-top:9px !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            .mcnImageCardTopImageContent,.mcnCaptionBlockInner
                            .mcnCaptionTopContent:last-child .mcnTextContent{
                            padding-top:18px !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            .mcnImageCardBottomImageContent{
                            padding-bottom:9px !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            .mcnImageGroupBlockInner{
                            padding-top:0 !important;
                            padding-bottom:0 !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            .mcnImageGroupBlockOuter{
                            padding-top:9px !important;
                            padding-bottom:9px !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            .mcnTextContent,.mcnBoxedTextContentColumn{
                            padding-right:18px !important;
                            padding-left:18px !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            .mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{
                            padding-right:18px !important;
                            padding-bottom:0 !important;
                            padding-left:18px !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            .mcpreview-image-uploader{
                            display:none !important;
                            width:100% !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            /*
                            @tab Mobile Styles
                            @section Heading 1
                            @tip Make the first-level headings larger in size for better readability
                            on small screens.
                            */
                            h1{
                            /*@editable*/font-size:20px !important;
                            /*@editable*/line-height:150% !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            /*
                            @tab Mobile Styles
                            @section Heading 2
                            @tip Make the second-level headings larger in size for better
                            readability on small screens.
                            */
                            h2{
                            /*@editable*/font-size:20px !important;
                            /*@editable*/line-height:150% !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            /*
                            @tab Mobile Styles
                            @section Heading 3
                            @tip Make the third-level headings larger in size for better readability
                            on small screens.
                            */
                            h3{
                            /*@editable*/font-size:18px !important;
                            /*@editable*/line-height:150% !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            /*
                            @tab Mobile Styles
                            @section Heading 4
                            @tip Make the fourth-level headings larger in size for better
                            readability on small screens.
                            */
                            h4{
                            /*@editable*/font-size:16px !important;
                            /*@editable*/line-height:150% !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            /*
                            @tab Mobile Styles
                            @section Boxed Text
                            @tip Make the boxed text larger in size for better readability on small
                            screens. We recommend a font size of at least 16px.
                            */
                            .mcnBoxedTextContentContainer
                            .mcnTextContent,.mcnBoxedTextContentContainer .mcnTextContent p{
                            /*@editable*/font-size:16px !important;
                            /*@editable*/line-height:150% !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            /*
                            @tab Mobile Styles
                            @section Preheader Visibility
                            @tip Set the visibility of the email"s preheader on small screens. You
                            can hide it to save space.
                            */
                            #templatePreheader{
                            /*@editable*/display:block !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            /*
                            @tab Mobile Styles
                            @section Preheader Text
                            @tip Make the preheader text larger in size for better readability on
                            small screens.
                            */
                            #templatePreheader .mcnTextContent,#templatePreheader
                            .mcnTextContent p{
                            /*@editable*/font-size:12px !important;
                            /*@editable*/line-height:150% !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            /*
                            @tab Mobile Styles
                            @section Header Text
                            @tip Make the header text larger in size for better readability on small
                            screens.
                            */
                            #templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
                            /*@editable*/font-size:16px !important;
                            /*@editable*/line-height:150% !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            /*
                            @tab Mobile Styles
                            @section Body Text
                            @tip Make the body text larger in size for better readability on small
                            screens. We recommend a font size of at least 16px.
                            */
                            #templateBody .mcnTextContent,#templateBody .mcnTextContent p{
                            /*@editable*/font-size:16px !important;
                            /*@editable*/line-height:150% !important;
                            }
                            }   @media only screen and (max-width: 480px){
                            /*
                            @tab Mobile Styles
                            @section Footer Text
                            @tip Make the footer content text larger in size for better readability
                            on small screens.
                            */
                            #templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
                            /*@editable*/font-size:12px !important;
                            /*@editable*/line-height:150% !important;
                            }
                            }
                        </style>
                    </head>
                    <body style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;
                        background-color: #fed149; height: 100%; margin: 0; padding: 0;padding-bottom:40px; width: 100%">
                        <center>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" id="bodyTable" style="border-collapse: collapse; mso-table-lspace: 0;
                                mso-table-rspace: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust:
                                100%; background-color: #fed149; height: 100%; margin: 0; padding: 0; width:
                                100%" width="100%">
                                <tr>
                                    <td align="center" id="bodyCell" style="mso-line-height-rule: exactly;
                                        -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; border-top: 0;
                                        height: 100%; margin: 0; padding: 0;padding-top: 40px; width: 100%" valign="top">
                                        <!-- BEGIN TEMPLATE // -->
                                        <!--[if gte mso 9]>
                                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
                                            <tr>
                                                <td align="center" valign="top" width="600" style="width:600px;">
                                                    <![endif]-->
                                                    <table border="0" cellpadding="0" cellspacing="0" class="templateContainer" style="border-collapse: collapse; mso-table-lspace: 0; mso-table-rspace: 0;
                                                        -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; max-width:
                                                        600px; border: 0" width="100%">
                                                        <tr>
                                                            <td id="templatePreheader" style="mso-line-height-rule: exactly;
                                                                -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #000;
                                                                border-top: 0; border-bottom: 0; padding-top: 8px; padding-bottom: 8px" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" class="mcnTextBlock" style="border-collapse: collapse; mso-table-lspace: 0;
                                                                    mso-table-rspace: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;
                                                                    min-width:100%;" width="100%">
                                                                    <tbody class="mcnTextBlockOuter">
                                                                        <tr>
                                                                            <td class="mcnTextBlockInner" style="mso-line-height-rule: exactly;
                                                                                -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%" valign="top">
                                                                                <table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnTextContentContainer" style="border-collapse: collapse; mso-table-lspace: 0;
                                                                                    mso-table-rspace: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust:
                                                                                    100%; min-width:100%;" width="100%">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="mcnTextContent" style="mso-line-height-rule: exactly;
                                                                                                -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; word-break: break-word;
                                                                                                color: #2a2a2a; font-family: Asap Helvetica, sans-serif; font-size: 12px;
                                                                                                line-height: 150%; text-align: left; padding-top:9px; padding-right: 18px;
                                                                                                padding-bottom: 9px; padding-left: 18px;" valign="top">
                                                                                                <a href="https://samsonstech.com" style="mso-line-height-rule: exactly;
                                                                                                    -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #2a2a2a;
                                                                                                    font-weight: normal; text-decoration: none" target="_blank" title="Jannat Developers">
                                                                                                    <img align="none" alt="" height="32" src="'.url("assets/img/logo/logo.png").'" style="-ms-interpolation-mode: bicubic; border: 0; outline: none;text-decoration: none; width: 100px;height: 100px; margin: 0px;" />
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td id="templateHeader" style="mso-line-height-rule: exactly;
                                                                -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #f7f7ff;
                                                                border-top: 0; border-bottom: 0; padding-top: 16px; padding-bottom: 0" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" class="mcnImageBlock" style="border-collapse: collapse; mso-table-lspace: 0; mso-table-rspace: 0;
                                                                    -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;
                                                                    min-width:100%;" width="100%">
                                                                    <tbody class="mcnImageBlockOuter">
                                                                        <tr>
                                                                            <td class="mcnImageBlockInner" style="mso-line-height-rule: exactly;
                                                                                -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding:0px" valign="top">
                                                                                <table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="border-collapse: collapse; mso-table-lspace: 0;
                                                                                    mso-table-rspace: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust:
                                                                                    100%; min-width:100%;" width="100%">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="mcnImageContent" style="mso-line-height-rule: exactly;
                                                                                                -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-right: 0px;
                                                                                                padding-left: 0px; padding-top: 0; padding-bottom: 0; text-align:center;" valign="top">
                                                                                                <a class="" href="https://jannatdevelopers.com" style="mso-line-height-rule:
                                                                                                    exactly; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color:
                                                                                                    #f57153; font-weight: normal; text-decoration: none" target="_blank" title="">
                                                                                                <a class="" href="https://jannatdevelopers.com/" style="mso-line-height-rule:
                                                                                                    exactly; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color:
                                                                                                    #f57153; font-weight: normal; text-decoration: none" target="_blank" title="">
                                                                                                <img align="center" alt="Forgot your password?" class="mcnImage" src="https://static.lingoapp.com/assets/images/email/il-password-reset@2x.png" style="-ms-interpolation-mode: bicubic; border: 0; height: auto; outline: none;
                                                                                                    text-decoration: none; vertical-align: bottom; max-width:1200px; padding-bottom:
                                                                                                    0; display: inline !important; vertical-align: bottom;" width="600"></img>
                                                                                                </a>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td id="templateBody" style="mso-line-height-rule: exactly;
                                                                -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #f7f7ff;
                                                                border-top: 0; border-bottom: 0; padding-top: 0; padding-bottom: 0" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" class="mcnTextBlock" style="border-collapse: collapse; mso-table-lspace: 0; mso-table-rspace: 0;
                                                                    -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; min-width:100%;" width="100%">
                                                                    <tbody class="mcnTextBlockOuter">
                                                                        <tr>
                                                                            <td class="mcnTextBlockInner" style="mso-line-height-rule: exactly;
                                                                                -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%" valign="top">
                                                                                <table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnTextContentContainer" style="border-collapse: collapse; mso-table-lspace: 0;
                                                                                    mso-table-rspace: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust:
                                                                                    100%; min-width:100%;" width="100%">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="mcnTextContent" style="mso-line-height-rule: exactly;
                                                                                                -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; word-break: break-word;
                                                                                                color: #2a2a2a; font-family: Asap Helvetica, sans-serif; font-size: 16px;
                                                                                                line-height: 150%; text-align: center; padding-top:9px; padding-right: 18px;
                                                                                                padding-bottom: 9px; padding-left: 18px;" valign="top">
                                                                                                <h1 class="null" style="color: #2a2a2a; font-family: Asap Helvetica,
                                                                                                    sans-serif; font-size: 32px; font-style: normal; font-weight: bold; line-height:
                                                                                                    125%; letter-spacing: 2px; text-align: center; display: block; margin: 0;
                                                                                                    padding: 0"><span style="text-transform:uppercase">Forgot</span></h1>
                                                                                                <h2 class="null" style="color: #2a2a2a; font-family: Asap Helvetica,
                                                                                                    sans-serif; font-size: 24px; font-style: normal; font-weight: bold; line-height:
                                                                                                    125%; letter-spacing: 1px; text-align: center; display: block; margin: 0;
                                                                                                    padding: 0"><span style="text-transform:uppercase">your password?</span></h2>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <table border="0" cellpadding="0" cellspacing="0" class="mcnTextBlock" style="border-collapse: collapse; mso-table-lspace: 0; mso-table-rspace:
                                                                    0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;
                                                                    min-width:100%;" width="100%">
                                                                    <tbody class="mcnTextBlockOuter">
                                                                        <tr>
                                                                            <td class="mcnTextBlockInner" style="mso-line-height-rule: exactly;
                                                                                -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%" valign="top">
                                                                                <table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnTextContentContainer" style="border-collapse: collapse; mso-table-lspace: 0;
                                                                                    mso-table-rspace: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust:
                                                                                    100%; min-width:100%;" width="100%">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="mcnTextContent" style="mso-line-height-rule: exactly;
                                                                                                -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; word-break: break-word;
                                                                                                color: #2a2a2a; font-family: Asap Helvetica, sans-serif; font-size: 16px;
                                                                                                line-height: 150%; text-align: center; padding-top:9px; padding-right: 18px;
                                                                                                padding-bottom: 9px; padding-left: 18px;" valign="top">Not to worry, we got you! Let’s get you a new password.
                                                                                                <br></br>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonBlock" style="border-collapse: collapse; mso-table-lspace: 0;
                                                                    mso-table-rspace: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;
                                                                    min-width:100%;" width="100%">
                                                                    <tbody class="mcnButtonBlockOuter">
                                                                        <tr>
                                                                            <td align="center" class="mcnButtonBlockInner" style="mso-line-height-rule:
                                                                                exactly; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;
                                                                                padding-top:18px; padding-right:18px; padding-bottom:18px; padding-left:18px;" valign="top">
                                                                                <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonBlock" style="border-collapse: collapse; mso-table-lspace: 0; mso-table-rspace: 0;
                                                                                    -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; min-width:100%;" width="100%">
                                                                                    <tbody class="mcnButtonBlockOuter">
                                                                                        <tr>
                                                                                            <td align="center" class="mcnButtonBlockInner" style="mso-line-height-rule:
                                                                                                exactly; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;
                                                                                                padding-top:0; padding-right:18px; padding-bottom:18px; padding-left:18px;" valign="top">
                                                                                                <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonContentContainer" style="border-collapse: collapse; mso-table-lspace: 0;
                                                                                                    mso-table-rspace: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;
                                                                                                    border-collapse: separate !important;border-radius: 48px;background-color:
                                                                                                    #F57153;">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td align="center" class="mcnButtonContent" style="mso-line-height-rule:
                                                                                                                exactly; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;
                                                                                                                font-family: Asap Helvetica, sans-serif; font-size: 16px; padding-top:24px;cursor: pointer;
                                                                                                                padding-right:48px; padding-bottom:24px; padding-left:48px;" valign="middle">
                                                                                                                <a class="mcnButton " href="'.url('/reset-password/'.$token).'" style="mso-line-height-rule: exactly;
                                                                                                                    -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; display: block; color: #f57153;
                                                                                                                    font-weight: normal; text-decoration: none; font-weight: normal;letter-spacing:
                                                                                                                    1px;line-height: 100%;text-align: center;text-decoration: none;color:
                                                                                                                    #FFFFFF; text-transform:uppercase;" target="_blank" title="Reset Password
                                                                                                                    invitation">Reset password</a>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <table border="0" cellpadding="0" cellspacing="0" class="mcnImageBlock" style="border-collapse: collapse; mso-table-lspace: 0; mso-table-rspace: 0;
                                                                    -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; min-width:100%;" width="100%">
                                                                    <tbody class="mcnImageBlockOuter">
                                                                        <tr>
                                                                            <td class="mcnImageBlockInner" style="mso-line-height-rule: exactly;
                                                                                -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding:0px" valign="top">
                                                                                <table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="border-collapse: collapse; mso-table-lspace: 0;
                                                                                    mso-table-rspace: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust:
                                                                                    100%; min-width:100%;" width="100%">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="mcnImageContent" style="mso-line-height-rule: exactly;
                                                                                                -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-right: 0px;
                                                                                                padding-left: 0px; padding-top: 0; padding-bottom: 0; text-align:center;" valign="top"></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <!--[if gte mso 9]>
                                                </td>
                                            </tr>
                                        </table>
                                        <![endif]-->
                                        <!-- // END TEMPLATE -->
                                    </td>
                                </tr>
                            </table>
                        </center>
                    </body>
                </html>
            ';
            if($mail->send()) {
                return back()->with('status','success')->with('msg','The Change Password URL is Sent to your Email Address.<br> Please Check your Inbox.')->withInput($request->only('email'));
            }
        }
        
        return back()->with('status','error')->with('msg','The Email Address not Found.')->withInput($request->only('email'));
    }

    public function reset_password($token) {
        if (PasswordReset::where('token',$token)->where('created_at','>',Carbon::now()->subHours(1))->count() > 0) {
            $row = PasswordReset::where('token',$token)->where('created_at','>',Carbon::now()->subHours(1))->first();
            return view('frontend.auth.reset-password',['token'=>$token]);
        }
        abort(419);
    }

    public function change_password(Request $request) {
        $errorMsgs = [
            'password.required' => "The Password Field is Required",
            'password.confirmed' => "The Confirm Password Does not Match"
        ];
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ],$errorMsgs);

        $validator->validate();

        $token = $request->token;

        if (PasswordReset::where('token',$token)->where('created_at','>',Carbon::now()->subHours(1))->count() > 0) {
            $row = PasswordReset::where('token',$token)->first();
            $user_id = $row['user_id'];

            $user_row = User::find($user_id);
            $user_row->password = Hash::make($request->password);
            $user_row->save();

            PasswordReset::where('token',$token)->delete();
            return redirect()->to('login')->with('status','reset_password_success')->with('msg','Your Password is Successfully Changed.');
        }
        abort(419);
    }

    public function edit_profile()
    {
        if (Auth::guard('web')->check()) {
            $data = [];
            $data['user'] = Auth::guard('web')->user();
            return view('frontend.auth.edit-profile', $data);
        } else {
            abort('404');
        }
    }

    public function update_profile(Request $request)
    {
        if (Auth::guard('web')->check()) {
            $errorMsgs = [
                'name.required' => "The Name Field is Required",
                'email.required' => 'Please provide Email Address',
                'email.email' => "The Email must be a vaild Email"
            ];

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
            ],$errorMsgs);

            $validator->after(function ($validator) {
                if(!empty($validator->errors()->toArray())) {
                    $validator->errors()->add('form', 'edit_profile');
                }
            });

            $validator->validate();

            $user = Auth::guard('web')->user();
            $profile_image_url = $user->profile_image;
            if ($request->hasFile('profile_image')) {
                $profile_image = $request->file('profile_image');
                $filename = \Illuminate\Support\Str::random(40).'.'.$profile_image->getClientOriginalExtension();
                $image = Image::make($profile_image->getRealPath());
                if ($image->width() > 300) {
                    $image->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }

                // $file_path = base_path('public/storage\\').'profile-images\\' .$filename; for localhost
                $file_path = base_path('public/storage/').'profile-images/' .$filename; //  for live
                $image->save($file_path);
                $profile_image_url = 'profile-images/'.$filename;
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->profile_image = $profile_image_url;
            $user->save();

            return back()->with('status','success')->with('form', 'edit-profile')->with('msg', 'Your Profile is Successfully Updated.');
        }
        abort(404);
    }

    public function change_password_edit(Request $request)
    {
        $errorMsgs = [
            'password.required' => "The Password Field is Required",
            'password.confirmed' => "The Confirm Password Does not Match"
        ];

        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6|confirmed',
        ],$errorMsgs);

        $validator->after(function ($validator) {
            if(!empty($validator->errors()->toArray())) {
                $validator->errors()->add('form', 'create_account');
            }
        });

        $validator->validate();

        $user = auth('web')->user();
        $user->password = bcrypt($request->password);
        $user->save();
        
        return back()->with('status','success')->with('form', 'change-password')->with('msg', 'Your Password is Successfully Changed.');

    }

    public function logout()
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
        return redirect()->to('/'); 
    }
}
