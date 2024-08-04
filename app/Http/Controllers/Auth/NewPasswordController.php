<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class NewPasswordController extends Controller {
    public function create($token) {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function store(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/'
            ]
        ],[
            'password.min' => 'Password minimal 8 karakter',
            'password.regex' => 'Password harus mengandung huruf kecil, huruf besar, angka, dan simbol.'
        ]);
        if($request["password"]!=$request["password_confirmation"]){
            return back()->withInput()->withErrors(["failed"=>"Konfirmasi sandi anda"]);
        }

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if($status === Password::PASSWORD_RESET){
            return redirect('/login');
        }else{
            return back()->withErrors(["failed"=>"Link reset sandi telah gagal dikirim"]);
        }
    }
}
