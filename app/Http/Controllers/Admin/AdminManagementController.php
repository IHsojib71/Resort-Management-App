<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per_page_item = request('show_no_of_results') ? request('show_no_of_results') : 5;
        $sort_by = request('admin_sort_by') ? request('admin_sort_by') : "id";
        $all_admins = Admin::orderBy($sort_by,'asc')
        ->where(function ($query){
           
            if($search = request('admin_search')){
                $query->where('name','LIKE',"%{$search}%");
                $query->orWhere('email','LIKE',"%{$search}%");
            }
        })
        ->paginate($per_page_item);
        return view('admin.admin_management',compact('all_admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newAdmin = new Admin;
        $validate = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        $password = Hash::make($request->password);
        $newAdmin->name = $request->input('name');
        $newAdmin->email = $request->input('email');
        $newAdmin->password = $password;
        
        $newAdmin->save();
        return redirect('/admin-management')->with('status','Admin Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin_edit = Admin::find($id);
        return view('admin.edit_admin',compact('admin_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin_update = Admin::find($id);
        $validate = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        $password = Hash::make($request->password);
        $admin_update->name = $request->input('name');
        $admin_update->email = $request->input('email');
        $admin_update->password = $password;
        
        $admin_update->update();
        return redirect('/admin-management')->with('status','Admin Details Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admins = Admin::find($id);
        $admins->delete();
        return redirect('/admin-management')->with('status','Admin deleted Successfully!');
    }
}
