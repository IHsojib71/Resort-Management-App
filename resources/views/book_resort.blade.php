@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">
                    <h5>Book Resort</h5>
                   
                </div>
                <div class="card-body">
              @if($reserve_date_from)
                    <p class="alert alert-success col-md-8 mx-auto">Congrates! this resort is available for your mentioned date!</p>
                @endif
                    <br>
                    
                    <form  action="{{ route('complete.booking',$resort_to_book->id) }}" method="POST">
                        @csrf

                        <div class="row mb-3">

                            <div class="col-md-6 mx-auto">
                            <h3 class="text-center">Book Now!</h3>
                            <br>
                            <label>Name</label>
                                <input id="customer_name" type="text" class="form-control @error('customer_name') is-invalid @enderror" name="customer_name" value="{{ old('customer_name') }}" placeholder="Customer Name" required>
                                @error('customer_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6  mx-auto">
                            <label>Email</label>
                                <input id="customer_email" type="text" class="form-control @error('customer_email') is-invalid @enderror" name="customer_email" placeholder="Email Address" required>
                                @error('customer_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                       
                            <div class="col-md-6  mx-auto">
                            <label>Phone</label>
                                <input id="customer_phone" type="text" class="form-control @error('customer_phone') is-invalid @enderror" name="customer_phone" placeholder="Phone Number" required>
                                @error('customer_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">

                    <div class="col-md-6  mx-auto">
                    <label>From</label>
                        <input id="f_date" type="text" class="form-control @error('reserve_date') is-invalid @enderror" value="{{$reserve_date_from}}" name="f_date" disabled>
                        <input type="hidden" value="{{$reserve_date_from}}" name="reserve_date_from" id="reserve_date_from">
                        <input type="hidden" value="{{$resort_to_book->title}}" name="resort_to_book" id="resort_to_book">
                        
                    </div>
                   
                    </div>
                    <div class="row mb-3">
                    <div class="col-md-6  mx-auto">
                        <label>To</label>
                        <input id="to_date" type="text" class="form-control @error('reserve_date') is-invalid @enderror" value="{{$reserve_date_to}}" name="to_date" disabled>
                        <input type="hidden" value="{{$reserve_date_to}}" name="reserve_date_to" id="reserve_date_to">
                      
                    </div>
                    </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mx-auto">
                                <button type="submit" class="btn btn-primary">
                                    Book Now!
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