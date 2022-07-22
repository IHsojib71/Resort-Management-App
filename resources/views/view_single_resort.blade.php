@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$single_resort->title}}  <a style="float: right;" href="{{ url()->previous() }}"><button class="btn btn-danger">Back</button></a></div>

                <div class="card-body">

                    <img src="/Resort-images/{{$single_resort->image}}" alt="{{$single_resort->image}}" width="100%" height="350px">
                    <div>
                    <h1>{{ $single_resort->title}}</h1>
                    <p>Cost :   {{ $single_resort->amount}}<span class="text-warning"> /Night</span></p>
                    <p>Details :{{ $single_resort->details}}</p>
                    
                    <a href="{{ url('/availability/'.$single_resort->id) }}" class="btn btn-success">Book Now!</a>
                    
                            
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection