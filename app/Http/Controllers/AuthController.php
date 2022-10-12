<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\authorizerequest;
use App\Http\Requests\auth\registerrequest;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function auth(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function login(authorizerequest $request){
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            $products = Products::with('category')->get();
            return redirect()->route('products')->with('Вы успешно зашли на аккаунт!');
        }

        return redirect()->route('auth.login')->with('status','Ваши данные неверны');
    }

    public function create(registerrequest $request){
        if($request->password == $request->confirm_password){
            User::create([
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=>Hash::make($request->password),
            ]);

            return redirect()->route('auth')->with('status','Успешная регистрация!');
        }

        return redirect()->route('register')->with('status','Ваш пороль не совпадает!');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('products')->with('status','Вы успешно вышли из аккаунта!');
    }
}
