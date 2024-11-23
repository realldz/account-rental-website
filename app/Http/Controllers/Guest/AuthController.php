<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\LoginRequest;
use App\Http\Requests\Guest\RegisterRequest;
use App\Models\PasswordReset;
use App\Models\User;
use App\Notifications\ResetPasswordRequest;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Str;

class AuthController extends Controller
{
    public function index()
    {
        $title = 'Passport';
        return view('user.pages.auth', compact('title'));
    }

    public function login(LoginRequest $request) 
    {
        $user = Auth::attempt($request->validated(), $request->input('remember'));

        if ($user) {
            if (Auth::user()->status == 0) {
                Auth::logout();
                return redirect()->back()->withErrors('Tài khoản đã bị khoá');
            }
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index');
            }
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

    public function resetPassword(Request $request, string $token = null) {
        if ($request->isMethod('POST')) {
            $email = $request->validate(['email' => 'required|email|exists:users,email']);
            $user = User::where('email', $email['email'])->firstOrFail();
            $passwordReset = PasswordReset::updateOrCreate(['email' => $user->email], [
                'email' => $user->email,
                'token' => Str::random(15),
            ]);
            if ($passwordReset) {
                $user->notify(new ResetPasswordRequest($passwordReset->token));
            }
            return redirect()->back()->with('successMsg', 'Liên kết đặt lại mật khẩu đã được gửi đến Email của bạn');
        }

        if ($request->isMethod('GET')) {
            // dd($token);
            if ($token) {
                $passwordReset = PasswordReset::where('token', $token)->firstOrFail();
                if (!$passwordReset) {
                    return redirect()->route('index');
                }
                return view('user.pages.resetpassword', compact('passwordReset'));
            }

        }

        return view('user.pages.resetpassword');
    }

    public function changePassword(Request $request) {
        $token = $request->input('token');
        $passwordReset = PasswordReset::where('token', $token)->firstOrFail();
        if (!$passwordReset) {
            return redirect()->route('index');
        }

        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $user = $passwordReset->user;

        $user->update(['password' => Hash::make($request->input('password'))]);
        $passwordReset->delete();
        return redirect()->route('auth.reset-password')->with('successMsg', 'Đã đặt lại mật khẩu');
    }
}
