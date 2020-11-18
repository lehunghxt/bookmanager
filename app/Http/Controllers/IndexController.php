<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function dashboard(){
        return view('admin_content.dashboard');
    }
    public function login(Request $request){
        if($request->isMethod('POST')){
            // Validate
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ], [
                'email.required'    => 'Email không được bỏ trống !',
                'password.required' => 'Mật khẩu không được bỏ trống !'
            ]);
            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
                'user_status' => 'active'
            ];
            if (Auth::attempt($credentials)) {
                return redirect('/');
            }
            return redirect()->back()->with('flash_message_error', 'Tên tài khoản hoặc mật khẩu không đúng. Hoặc tài khoản của bạn đang bị khóa !');
        }
        if(Auth::check()) return redirect('/');
        return view('auth-theme.login');
    }

    public function register(Request $request){
        if($request->isMethod('POST')){
            // Validate
            $request->validate([
                'name' => 'required|unique:users|max:255',
                'email' => 'required|unique:users|max:255',
                'password' => 'required|confirmed|min:6',
            ], [
                'name.required'     => 'Email không được bỏ trống !',
                'name.unique'       => 'Tên người dùng đã tồn tại !',
                'name.max'          => 'Tên người dùng quá dài !',
                'email.required'     => 'Email không được bỏ trống !',
                'password.required'  => 'Mật khẩu không được bỏ trống !',
                'password.confirmed' => 'Mật khẩu xác nhận không khớp !',
                'password.min'       => 'Mật khẩu quá ngắn !',
            ]);
            // VALIDATE DONE -- REGISTER
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('dang-nhap')->with('flash_message_success', 'Đăng ký thành công, tài khoản của bạn đang đợi admin phê duyệt !');

        }
        if(Auth::check()) return redirect('/');
        return view('auth-theme.register');
    }

    public function logout(){
        Auth::logout();
        return redirect('dang-nhap');
    }
}
