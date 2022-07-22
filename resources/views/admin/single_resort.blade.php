@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <Strong> {{ $single_resort->title }}</Strong>
                    <a style="float: right;" href="{{ url()->previous() }}"><button class="btn btn-danger">Back</button></a>
                </div>

                <div class="card-body">
                <div class="card">
  <div class="row">
    <div class="col-md-6">
    <img class="rounded" width="500px" src="/Resort-images/{{ $single_resort->image}}" alt="{{ $single_resort->image }}">
    </div>
    <div class="col-md-4">
      <div class="card-body">
        <h6 class="card-title">Resort Name : {{  $single_resort->title }}</h6>
        <p class="card-title">Cost Per Night : {{  $single_resort->amount }}</p>
        <p class="card-title">Details : {{  $single_resort->details }}</p>
        
        
      
      </div>
     
    </div>
    
  </div>
</div>
            </div>

 @endsection