<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\User;


class UserServices
{
    public function registerUser($request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        return User::create($input);
    }
    public function loginUser($request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return true;
        }
        return false;
    }
    public function updateUser($request)
    {
        
    }
}
