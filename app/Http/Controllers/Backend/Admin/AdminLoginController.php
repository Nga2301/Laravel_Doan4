<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminLoginController extends Controller
{
    public function getLoginAdmin(){
        return view('backend.admin.login');
    }

    public function postLoginAdmin(Request $request){
        $redentials=$request->only('email','password');
        if(Auth::guard('admins')->attempt($redentials)){

            return redirect()->route('get_backend.home');
        }
        return redirect()->back();
    }
    public function getLogout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('get_backend.login');
    }
}