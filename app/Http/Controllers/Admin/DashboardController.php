<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function admin_dashboard(){

    // $all_admins = Admin::orderBy('id', 'desc')->paginate(1);
        return view('admin.admin_dashboard');
    }
}
