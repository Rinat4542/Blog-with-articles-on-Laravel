<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(LoginRequest $request)
    {
        //можно передать провалидированые методы сразу, потому как они совпадают
        //Auth::attempt($request->validated());

        //Аналогичный метод проверки емейла и пароля
        Auth::attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ]);
        return redirect()->route('hello');


        //Проверка по имени и паролю
        // Auth::attempt([
        //     'name'=>$request->input('name'),
        //     'password'=>$request->input('password')
        // ]);
        // return redirect()->route('hello');

        

        // $user = User::whereEmail($request->input('email'))->first();// Получение пользователя по емейлу
        // if($user)//если пользователь найден проверяем пароль
        // {
        //     if(Hash::check($request->input('password'), $user->password))//проверям введеный пароль с захешированным в базе данных
        //     {
        //         Auth::login($user, true);//запоминание юзера
        //         return redirect()->route('hello');
        //     }
        // }
        
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.action');
    }
}
