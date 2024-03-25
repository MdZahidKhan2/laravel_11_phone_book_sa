<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function showLogin()
    {
        return view ('admin.login');
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
            Auth::guard('admin')->attempt([
                'name' => \request('name'),
                'password' => \request('password'),
            ])
        ) {
            return redirect('admin/dashboard');
        } else {
            return redirect()->back()->with('loginError', 'Credential Does not match!');
        }
    }

    public Function logout()
    {
        Auth::guard('admin')->logout();

        return to_route('login');
    }
}
