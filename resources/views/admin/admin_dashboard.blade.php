@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          
                
                    <h5 class="alert alert-success">Welcome to admin panel {{Auth::guard('admin')->user()->name}}!</h5>
                     
               

                <!-- <div class="card-body">

                

                </div> -->


 @endsection