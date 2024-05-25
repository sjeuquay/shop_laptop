<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        return view('Site.account.register');
    }
    public function Postregister(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'user_name' => [
                    'required',
                    'unique:users,user_name'
                ],
                'email' => [
                    'required',
                    'regex:/^.+@.+\..+$/i'
                ],
                'password' => [
                    'required',
                    'between:8,20',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
                ]
            ],
            [
                'user_name.required' => 'Vui lòng nhập tài khoản.',
                'user_name.unique' => 'Tài khoản đã tồn tại.',
                'name.required' => 'Vui lòng nhập tài khoản.',
                'email.required' => 'Vui lòng nhập địa chỉ email.',
                'email.regex' => 'Địa chỉ email không hợp lệ.',
                'password.required' => 'Vui lòng nhập mật khẩu.',
                'password.between' => 'Mật khẩu phải có từ 8 đến 20 ký tự.',
                'password.regex' => 'Mật khẩu phải chứa ít nhất một chữ cái viết thường, một chữ cái viết hoa và một số.'
            ]
        );
        try {
            $request->merge(['password'=>Hash::make($request->password)]);

            User::create($request->all());
            return redirect()->route('login');
        }catch(\Throwable $throwable) {
            dd($throwable);
        }
    }
    public function login()
    {
        return view('Site.account.login');
    }

    public function Postlogin(Request $request)
    {
        $request->validate(
            [
                'user_name' => 'required',
                'password' => 'required',
            ],
            [
                'user_name.required' => 'Vui lòng nhập tài khoản',
                'password.required' => 'Vui lòng nhập mật khẩu',
            ]
        );
        $user = User::where('user_name', $request->user_name)->first();
        if (!$user) {
            return redirect()->route('login')->withErrors(['user_name' => 'Tài khoản không tồn tại'])->withInput($request->only('user_name'));
        } else {
            if (Auth::attempt(['user_name' => $request->user_name, 'password' => $request->password])) {
                if (Auth::user()->role_id == '1') {
                    
                    return redirect()->route('home');
                } else {
                    // admin dashboard
                    dd('dashboard');
                }
            } else {
                return redirect()->route('login')->withErrors(['password' => 'Mật khẩu không chính xác.'])->withInput($request->only('user_name'));
            }
        }
        try {
        } catch (\Throwable $error) {

        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('home');
    }
}
