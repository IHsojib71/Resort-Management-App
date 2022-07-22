@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Edit Resort</strong><a style="float: right;" href="{{ url('/resort-management') }}"><button class="btn btn-danger">Back</button></a></div>

                <div class="card-body">
                    <form method="POST" action="{{ url('resort-management/'.$edit_resort->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $edit_resort->title }}" placeholder="Title" autocomplete="title">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Amount/Night</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" placeholder="Amount" value="{{ $edit_resort->amount }}">

                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="details" class="col-md-4 col-form-label text-md-end">Details</label>

                            <div class="col-md-6">
                            <textarea class="form-control @error('details') is-invalid @enderror" id="details" name="details" rows="3" placeholder="Details">{{ $edit_resort->details }}</textarea>

                                @error('details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <img class="rounded" src="/Resort-images/{{ $edit_resort->image}}" alt="{{ $edit_resort->image }}" height="50%" width="32%" style="display: block;margin:0 auto;">
                        <br>
                        <div class="row mb-3">
                        
                            <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>

                            <div class="col-md-6">
                                <input  type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>

                            
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
