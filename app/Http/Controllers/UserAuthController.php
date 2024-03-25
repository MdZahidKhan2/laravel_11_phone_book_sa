<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class UserAuthController extends Controller
{
    public function showLogin()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        // $this->validate(request(),[
        //     'name' => 'required',
        //     'password' => 'required'
        // ]);

        if (
            Auth::attempt([
                'name' => \request('name'),
                'password' => \request('password'),
            ])
        ) {
            return to_route('contactList');
        } else {
            return redirect()->back()->with('loginError', 'Credential Does not match!');
        }
    }

    public Function logout()
    {
        Auth::logout();

        return to_route('login');
    }
}
