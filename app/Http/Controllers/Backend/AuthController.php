<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard')->with('success', 'Login successfully');
        } else {
            return redirect()->back()->withInput(['email' => $request->email])->with('loginError', 'Credentials not matched.');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect()->route('home')->with('success', 'Logout Successfully.');
    }
}
