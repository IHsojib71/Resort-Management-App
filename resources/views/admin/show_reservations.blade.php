@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('status'))
                <p class="alert alert-success">{{ session('status') }}</p>
            @endif
            <div class="card">
                <div class="card-header">
                    <strong>Reservations</strong> 
                     <!-- filter -->
                     <form class="d-flex float-end">
                                <select name="reservation_sort_by" id="reservation_sort_by" class=" form-control" onchange="this.form.submit()">
                                    <option value="">Sort By</option>
                                    <option value="reserve_date_from">Check In</option>
                                    <option value="reserve_date_to">Check Out</option>
                                    <option value="customer_name">Customer Name</option>
                                </select>
                                &nbsp;&nbsp;
                            <input type="text" class=" form-control" name="reservation_search" id="reservation_search" placeholder="Search">
                            &nbsp;
                            <button class=" btn btn-success" type="submit">Search</button>
                            
                        </form>
                </div>

                <div class="card-body">
               
                            <table class="table">
                            <tr class="bg-secondary text-white text-center">

                                    <td>S.N.</td>
                                    <td>Customer Name</td>
                                    <td>Phone Number</td>
                                    <td>Check In</td>
                                    <td>Check Out</td>
                                    <td>Booked For</td>
                                    <td>Action</td>
                                    
                                </tr>
                            @foreach($reservations as $index => $res)
                                
                                <tr>
                        <td class="text-center">{{ $index+$reservations->firstItem() }}</td>
                        <td class="text-center">{{$res->customer_name}}</td>
                        <td class="text-center">{{$res->customer_phone}}</td>
                        <td class="text-center">{{$res->reserve_date_from}}</td>
                        <td class="text-center">{{$res->reserve_date_to}}</td>
                        <td class="text-center">{{$res->resort_title}}</td>
                        
                        <td class="text-center"><a href="{{ route('check.out',$res->id) }}"><button class="btn btn-danger">Checked Out</button></a></td>
                      
                                </tr>
                             
                            @endforeach
                            </table>
        
                </div>
                <div class="container">
                <form>
            Show
            <select name="show_no_of_results" id="show_no_of_results" onchange="this.form.submit()">
                <option value="5" {{ request('show_no_of_results') ==5 ? "selected" : "" }}>5</option>
                <option value="10" {{ request('show_no_of_results') ==10 ? "selected" : "" }}>10</option>
                <option value="15" {{ request('show_no_of_results') ==15 ? "selected" : "" }}>15</option>
            </select> Per Page
        </form>
                {{$reservations->links('pagination::bootstrap-5')}}
                </div>
                
 @endsection