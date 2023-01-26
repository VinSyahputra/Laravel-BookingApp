<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function authenticate(Request $request){
        // return $request;
        $credentials = $request->validate([
           'username' => 'required',
           'password' => 'required|min:8', 
        ]);

        if(Auth::attempt($credentials)){
            //if authenticate is success then all request adding to session also prevent session fixation attact and then redirect to dashboard
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        //if authenticate is fail then return back with error message
        return back()->with('fail', 'Login failed, please try again');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'contact' => 'required',
            'password' => 'required|min:8',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);

        return redirect('/login')->with('success', 'create account successfully');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
