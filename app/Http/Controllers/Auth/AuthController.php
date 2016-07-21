<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    public function getSignup()
    {
        return view('auth.signup');
    }

    public function postSignup(Request $request)
    {
    	//-----------Input Validation--------------------------
    	$this->validate($request, [
    		'email'		=>	'required|unique:users|email|max:255',
    		'username'	=>	'required|unique:users|alpha_dash|max:20',
    		'password'	=>	'required|min:6',
    		]);
    	//----------Parse to the db----------------------------
    	User::create([
    		'email'		=>	$request->input('email'),
    		'username'	=>	$request->input('username'),
    		'password' => bcrypt($request->input('password')),
    		]);

    	return redirect()->route('home')->with('success','Registration Completed');
    }

    public function getSignin()
    {
        return view('auth.signin');
    }
}
