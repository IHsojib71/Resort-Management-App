@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(session('completed_booking'))
        <p class="alert alert-success col-md-11">{{ session('completed_booking') }}</p>
        @endif
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h5>Popular Resorts</h5>
                </div>

                @foreach($all_resorts->chunk(3) as $chunk)
                <div class="card-group">
                    @foreach($chunk as $resort)
                    <div class="card" style="width: 18rem; margin:10px; border:none;">
                        <img src="/Resort-images/{{$resort->image}}" alt="{{$resort->image}}" width="350px" height="250px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $resort->title }}</h5>
                            <p class="card-text">{{ $resort->amount }} BDT<span class="text-warning"> / Night</span></p>
                            <a href="{{ route('availibility.form',$resort->id) }}" class="btn btn-success">Check Availability</a>
                            <a href="{{ url('/resort/'.$resort->id) }}" class="btn btn-info">View</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <br>
    <div>
        <form>
            Show
            <select name="show_no_of_results" id="show_no_of_results" onchange="this.form.submit()">
                <option value="6" {{ request('show_no_of_results') ==6 ? "selected" : "" }}>6</option>
                <option value="10" {{ request('show_no_of_results') ==10 ? "selected" : "" }}>10</option>
                <option value="15" {{ request('show_no_of_results') ==15 ? "selected" : "" }}>15</option>
            </select> Per Page
        </form>
        {{$all_resorts->links('pagination::bootstrap-5')}}
    </div>

</div>
@endsection