<?php

namespace App\Http\Controllers;


use App\Models\Admin;
use App\Models\Resort;
use App\Models\Reservation;
use App\Notifications\AdminNotification;
use Illuminate\Http\Request;
use App\Notifications\BookingConfirmation;
use Illuminate\Support\Facades\Notification;

class FrontEndController extends Controller
{
    public function index()
    {
        $per_page_item = request('show_no_of_results') ? request('show_no_of_results') : 6;
        $all_resorts = Resort::orderBy('id', 'desc')->paginate($per_page_item);
        return view('front_end', compact('all_resorts'));
    }


    public function view_single_resort($id)
    {
        $single_resort = Resort::find($id);
        return view('view_single_resort', compact('single_resort'));
    }


    public function availability_form($id)
    {
        $resort_details = Resort::find($id);
        return view('resort_availability_check', compact('resort_details'));
    }


    public function check_availability(Request $request, $id)
    {
        $validated = $request->validate([
            'reserve_date_from' => 'required',
            'reserve_date_to' => 'required',

        ]);
        $resort_to_book = Resort::find($id);
        $reserve_date_from = $request->reserve_date_from;
        $reserve_date_to = $request->reserve_date_to;

        $available = Reservation::where('resort_id','=',$id)
        ->whereDate('reserve_date_from','<=',$reserve_date_from)
        ->whereDate('reserve_date_from','<=',$reserve_date_to)
        ->whereDate('reserve_date_to','>=',$reserve_date_from)
        ->whereDate('reserve_date_to','>=',$reserve_date_to)
        
        ->get();
       
        if ($available->isEmpty()) {
            return view('book_resort', compact('resort_to_book', 'reserve_date_from','reserve_date_to'))->with('available_msg', 'This Resort Is Available Book Now!');
        } else {
            return redirect('/availability/' . $id)->with('status', 'This resort is not available!');
        }
    }

    public function book_reosrt()
    {
        return view('book_resort');
    }
    public function complete_booking(Request $request, $id)
    {
        $validate = $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required',
            'customer_phone' => 'required',

        ]);
        $resort = Resort::find($id);
        $reservation = new Reservation;
        $reservation->customer_name = $request->customer_name;
        $reservation->customer_email = $request->customer_email;
        $reservation->customer_phone = $request->customer_phone;
        $reservation->reserve_date_from = $request->reserve_date_from;
        $reservation->reserve_date_to = $request->reserve_date_to;
        $reservation->resort_title = $request->resort_to_book;
        //saving data to reservation table using eloquent relationship 
        $resort->reservations()->save($reservation);
        // email to customer 
        $customer_name = $request->customer_name;
        $customer_email = $request->customer_email;

        Notification::route('mail', [
            $customer_email => $customer_name,
        ])->notify(new BookingConfirmation($customer_name));

        // email to admin
        $admin = Admin::first();
        $admin_email = $admin->email;
        $admin_name = $admin->name;
        Notification::route('mail', [
            $admin_email => $admin_name,
        ])->notify(new AdminNotification($customer_name));

        return redirect('/')->with('completed_booking', 'Your booking was placed!');
    }
}
