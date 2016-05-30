<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    public function autorizar(Request $request)
    {
        
        $user = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $remember = ($request->has('remember_me')) ? true : false;
        if (auth()->attempt($user, $remember)) {
            // return redirect()->route('home');
        } else {
            // return redirect('login')->withErrors(['Problemas no login']);
        }

    }

    public function logout($id)
    {
        return auth()->logout();
        return redirect()->route('home');
    }
}
