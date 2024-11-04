<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('user.pages.auth');
    }

    public function login(LoginRequest $request) 
    {
        $user = Auth::attempt($request->validated(), $request->input('remember'));

        if ($user) {
            return redirect()->route('index');
        } else {
            return redirect()->back()->withErrors( 'Sai thông tin đăng nhập');
        }

    }

    public function register(RegisterRequest $request) 
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        if ($user) {
            Auth::login($user);
            return redirect()->route('index');
        } else {
            return redirect()->back()->withErrors('Không thể tạo tài khoản');
        }
    }

    public function resetPassword(Request $request) {
        if ($request->isMethod('POST')) {
            $email = $request->validate(['email' => 'required|email|exists:users,email']);
            // TODO: send email
            return redirect()->back()->with('successMsg', 'Liên kết đặt lại mật khẩu đã được gửi đến Email của bạn');
        }

        return view('user.pages.resetpassword');
    }
}
