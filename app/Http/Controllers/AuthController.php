<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }


    public function LoginStore(Request $request)
    {
        $clients = $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($clients)) {
            if(Auth::user()->role == 'user'){
            $request->session()->regenerate();
            return redirect()->route('clientsPage');
        }else{
            $request->session()->regenerate();
            return redirect()->route('adminPage');
        }
    }
        return back();
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $this->welcome();
    }
}
