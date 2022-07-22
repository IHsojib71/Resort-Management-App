<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function admin_login_form(){
        return view('admin.admin_login');
    }
    public function admin_login(Request $request){
        $request->validate([$request,
            'email'=>'required',
            'password'=>'required',
    ]);

    if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('admin/dashboard');
        }else{
            Session::flash('invalid_message', 'Invalid Email Or Password!'); 
            return redirect()->back();
        }
    }

    public function admin_logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin')->with('logout_msg','Successfully Logged Out!');
    }

}
