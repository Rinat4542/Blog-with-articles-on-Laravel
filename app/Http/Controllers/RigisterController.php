<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RigisterController extends Controller
{
    public function index()
    {
        return view('pages.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']); //шифруем пароль с помощью метода make, класса Hash.
        User::create($data);
        return  redirect()->route('login.action');
    }
}
