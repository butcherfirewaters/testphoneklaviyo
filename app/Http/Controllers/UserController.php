<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(){
        return view('user.create');
    }

    public function store(Request $request){

        //лучше конечно внедрять Пользовательский объект Реквеста

        $request->validate([
            'name' => 'required',
            'password' => 'required|confirmed',
            'email' => 'required|email|unique:users',
        ]);

        $password = bcrypt($request->password);

        $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => $password,
        ]);

        session()->flash('success', 'Регистрация пройдена и Вы авторизировались в системе');
        Auth::login($user);
        return redirect()->route('admin.index')->with(['success' => 'Вы успешно авторизовались']);

    }

    public function loginForm(){
        return view('user.login');
    }

    public function login(Request $request){
        $request->validate([
            'password' => 'required',
            'email' => 'required|email',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])){
            return redirect()->route('admin.index')->with(['success' => 'Вы успешно авторизовались']);
        }else {
            redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login.create')->with(['success' => 'Вы успешно вышли из системы']);
    }
}
