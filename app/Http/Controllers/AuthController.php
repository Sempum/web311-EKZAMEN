<?php

namespace App\Http\Controllers;

use App\Mail\HelloMail;
use App\Models\Captcha;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function registerIndex()
    {
        return view('layouts.auth.register', [
            'captcha' =>Captcha::all()->random(),
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|min:4|unique:users|email',
            'password' =>'required|min:6',
            'repeat_password' =>'required|same:password'
        ]);

        $captchaId = $request->input('secret');

        $captcha = Captcha::find($captchaId);

        if($request->input('captcha') == $captcha->code){
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            $user->assignRole('user');
            $user->givePermissionTo(['manage documents', 'post report']);


        } else {
            return back();
        }

        Mail::to($user->email)->send(new HelloMail($user->name, $user->email ,$request->input('password')));

        return redirect()->route('app.index');
    }

    public function loginIndex()
    {
        return view('layouts.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('app.index');
        }

        return back()->withErrors([
            'email' => 'Email или пароль введены не верно',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('app.index');
    }

    public function getCode(Captcha $captcha)
    {
        return response()->json([
            'captchaCode' => $captcha->code,
        ]);
    }
}
