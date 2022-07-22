<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Resort;
use Illuminate\Http\Request;

class ReservationManagementController extends Controller
{
    function index(){
        $resort = Resort::all();
        $per_page_item = request('show_no_of_results') ? request('show_no_of_results') : 5;
        $sort_by = request('reservation_sort_by') ? request('reservation_sort_by') : "id";
        $reservations = Reservation::with('resort')->orderBy($sort_by,'asc')
        ->where(function ($q){
            if($search = request('reservation_search')){
                $q->where('customer_name','LIKE',"%{$search}%");
                $q->orWhere('customer_phone','LIKE',"%{$search}%");
                $q->orWhere('reserve_date_from','LIKE',"%{$search}%");
                $q->orWhere('reserve_date_to','LIKE',"%{$search}%");
                $q->orWhere('resort_title','LIKE',"%{$search}%");
            }
        })
        ->paginate($per_page_item);
      

        return view('admin.show_reservations',compact('reservations','resort'));
    }
    public function check_out($id){
        $res = Reservation::find($id);
        $res->delete();
        return redirect('show-reservations')->with('status','Reservation Checked Out!');
        
    }
}
