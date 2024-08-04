<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;


class PasswordResetLinkController extends Controller {
    public function create() {
        return view('auth.forgot-password');
    }

    public function store(Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if($status === Password::RESET_LINK_SENT){
            return back()->withErrors(["success"=>"Link reset sandi telah dikirim ke email anda, segera periksa"]);
        }else{
            return back()->withErrors(["failed"=>"Link reset sandi telah gagal dikirim"]);
        }
    }
}
