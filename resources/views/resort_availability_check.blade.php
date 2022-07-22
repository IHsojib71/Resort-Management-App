@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Check Availability  <a style="float: right;" href="{{ url()->previous() }}"><button class="btn btn-danger">Back</button></a></h5>
                   
                </div>
                <br>
                @if(session('status'))
                <div class="alert alert-danger col-md-4 mx-auto" role="alert">
                    <p>{{session('status')}}</p>
                </div>
               @endif
               
                        <div class="card-body">
                            <img class="mx-auto d-block rounded" src="/Resort-images/{{$resort_details->image}}" alt="{{$resort_details->image}}" width="50%" height="50%">
                        <br>
                            <form method="POST" action="{{ route('available.check',$resort_details->id) }}">
                        @csrf

                        <div class="row mb-3">
                            
                            
                            <div class="col-md-6 mx-auto">
                            <label>Resort Name :</label>
                                <input id="resort_name" type="text" class="form-control @error('resort_name') is-invalid @enderror" name="resort_name" value="{{ $resort_details->title }}" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                           
                            <div class="col-md-6  mx-auto">
                            <label>From</label>
                                <input id="reserve_date_from" type="date" class="form-control @error('reserve_date_from') is-invalid @enderror" name="reserve_date_from"  placeholder="Date">
                                @error('reserve_date_from')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                           
                           <div class="col-md-6  mx-auto">
                           <label>To</label>
                               <input id="reserve_date_to" type="date" class="form-control @error('reserve_date_to') is-invalid @enderror" name="reserve_date_to"  placeholder="Date">
                               @error('reserve_date_to')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                               @enderror
                           </div>
                       </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mx-auto">
                                <button type="submit" class="btn btn-primary">
                                    Check Availability
                                </button>

                            </div>
                        </div>
                    </form>
                        </div>
                 

            </div>
        </div>
    </div>
    <br>
   

</div>
@endsection