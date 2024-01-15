<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Auth;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function create_account()
    {
        return view('frontend.auth.create-account');
    }
    public function login()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->to('/');
        }
        $data = [];
        $data['remember_me'] = false;
        if (Cookie::has('user_remember_me')) {
            $remember_cookie = json_decode(Cookie::get('user_remember_me'));
            if (isset($remember_cookie[0])) {
                $remember_me_token = $remember_cookie[0];
                if(User::where('remember_me_token',$remember_me_token)->count() > 0) {
                    $user = User::where('remember_me_token',$remember_me_token)->first();
                    if (strtotime($user->remember_expiry) > time()) {
                        $data['remember_me'] = true;
                        $data['email'] = $user->email;
                        $data['password'] = $remember_cookie[1];
                    }
                }
            }
        }
        return view('frontend.auth.login', $data);
    }
    public function control_panel_login() {
        $data = [];
        $data['remember_me'] = false;
        if (Cookie::has('admin_remember_me')) {
            $remember_cookie = json_decode(Cookie::get('admin_remember_me'));
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
        return view('control-panel.auth.login',$data);
    }
}
