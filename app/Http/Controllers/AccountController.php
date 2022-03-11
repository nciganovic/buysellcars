<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends BaseController
{
    function get_login()
    {
        return view("account.login");
    }

    function post_login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        $remember = false;
        if($request->remember_me)
            $remember = true;

        if(Auth::attempt(['email' => $credentials["email"], 'password' => $credentials["password"]], $remember)) {
            $user = User::where('email', '=', $credentials["email"])->first();

            if($user->is_admin == 1)
                return redirect()->route('get_admin_index');
            else
                return redirect()->route('get_home_index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    function get_register()
    {
        return view("account.register");
    }

    function post_register(Request $request)
    {
        $this->validate($request, [
            "first_name" => "required|max:25|alpha",
            "last_name" => "required|max:25|alpha",
            "email" => "required|unique:users|email",
            "phone_number" => "required|digits:10",//^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$
            "password" => "required|confirmed|min:8",
        ]);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->is_admin = 0;
        $user->save();

        Auth::loginUsingId($user->id);

        return redirect()->route("get_home_index");
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route("get_home_index");;
    }

    function get_user_profile ($id)
    {
        return view("account.profile");
    }
}
