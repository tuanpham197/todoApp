<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserServices;
use App\Http\Requests\UserRequest;
use App\Http\Requests\RegisterRequest;


class UserController extends Controller
{
    //
    public function __construct(UserServices $userServices) {
        $this->userServices = $userServices;
    }
    public function getRegister()
    {
        return view('register');
    }
    public function postRegister(RegisterRequest $request)
    {
        $user = $this->userServices->registerUser($request);
        if($user){
            return \redirect('/');
        }else{
            $message = "Register fails ?";
            return view('register',compact('message'));
        }
    }
    public function getLoginUser()
    {
        return view('login');
    }
    public function checkLoginUser(UserRequest $request)
    {
        $user = $this->userServices->loginUser($request);
        if($user){
            return \redirect('/user/task');
        }
        else{
            $message = "Please check email and password !!";
            return view('login',compact("message"));
        }
    }
}
