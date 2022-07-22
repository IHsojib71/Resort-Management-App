<?php

namespace App\Http\Controllers\Admin;

use App\Models\Resort;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ResortManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $per_page_item = request('show_no_of_results') ? request('show_no_of_results') : 5;

        if (request('sort_by') == 'amount-high') {
            $d = 'desc';
            $sort_by = 'amount';
        } else {
            $d = 'asc';
            $sort_by = request('sort_by') ? request('sort_by') : "id";
        }


        $resorts = Resort::orderBy($sort_by, $d)->where(function ($query) {

            if ($search = request('search')) {
                $query->where('title', 'LIKE', "%{$search}%");
                $query->orWhere('amount', 'LIKE', "%{$search}%");
                $query->orWhere('details', 'LIKE', "%{$search}%");
            }
        })
            ->paginate($per_page_item);
        return view('admin.resort_management', compact('resorts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.new_resort');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'amount' => 'required',
            'details' => 'required',
            'image' => 'required',
        ]);
        $new_resort = new Resort();
        $title = $request->get('title');
        $amount = $request->get('amount');
        $details = $request->get('details');
        $image = $request->file('image')->getClientOriginalName();

        //move uploaded file
        $request->image->move(public_path('Resort-images'), $image);
        $new_resort->title = $title;
        $new_resort->amount = $amount;
        $new_resort->details = $details;
        $new_resort->image = $image;
        $new_resort->save();


        return redirect('/resort-management')->with('status', 'Resort Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $single_resort = Resort::find($id);
        return view('admin.single_resort', compact('single_resort'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_resort = Resort::find($id);
        return view('admin.edit_resort', compact('edit_resort'));
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
        $update_data = Resort::find($id);
        $validate = $request->validate([
            'title' => 'required',
            'amount' => 'required',
            'details' => 'required',

        ]);
        if ($request->file('image') == null) {
            $update_data->title = $request->title;
            $update_data->amount = $request->amount;
            $update_data->details = $request->details;
            $update_data->update();
        } else {

            $path = public_path('Resort-images') . '/' . $update_data->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $image = $request->file('image')->getClientOriginalName();
            $update_data->title = $request->title;
            $update_data->amount = $request->amount;
            $update_data->details = $request->details;
            $update_data->image = $image;
            //move uploaded file
            $request->image->move(public_path('Resort-images'), $image);
            $update_data->update();
        }

        return redirect('resort-management')->with('status', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resorts = Resort::find($id);
        //deleting image on delete
        $path = public_path('Resort-images') . '/' . $resorts->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $resorts->delete();
        return redirect('/resort-management')->with('status', 'Resort deleted Successfully!');
    }
}
