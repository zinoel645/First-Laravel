<?php

namespace App\Http\Controllers;

use App\Mail\OtpMail;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function check_otp(StoreUserRequest $request)
    {
        // Lấy thông tin người dùng từ session (nếu có)
        $userData = session()->get('user_data', []);

        // Cập nhật thông tin người dùng từ request
        $userData = array_merge($userData, $request->validated());

        $otpCode = rand(100000, 999999);
        Mail::to($userData['email'])->send(new OtpMail($otpCode));

        session(['otp_code' => $otpCode, 'user_data' => $userData]);
        return redirect()->route('verify_form');
    }

    public function showVerifyForm()
    {
        return view('auth.check_otp');
    }

    public function store(Request $request)
    {
        $otpCode = session('otp_code');
        $userData = session('user_data', []);

        if ($request->code == $otpCode) {

            $userData['password'] = Hash::make($userData['password']); //mã hóa mk

            User::create($userData);
            session()->flash('success', 'Register successfully!');
            return redirect()->route('login');
        } else {
            return view('auth.check_otp')->withErrors(['code' => ['Invalid OTP code.']]);
        }
    }

    public function process_login(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'password' => 'required|min:8|regex:/[0-9]/',
        ]);

        $user = User::where('user_name', $request->input('user_name'))->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            // Đăng nhập thành công...
            Auth::loginUsingId($user->id);
            return redirect()->route('main.index');
        }

        // Đăng nhập thất bại...
        return redirect()->route('login')->with('error', 'Username or password is incorrect!');
    }

    public function logout()
    {
        Auth::logout();
        Cart::instance('cart')->destroy();

        return redirect()->route('main.index')->with('logout_success', 'Logout successfully!');
    }




}
