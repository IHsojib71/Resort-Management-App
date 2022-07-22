@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">


        <div class="col-md-12">
             @if(session('status'))
                <span class="alert alert-success mx-auto" style="text-align: right;display:block;">{{session('status')}}</span>
                @endif
            <div class="card">
                <div class="card-header">
                    <strong>Resorts</strong> 
                    <!-- filter -->
                    <form class="d-flex float-end">
                                <select name="sort_by" id="sort_by" class=" form-control" onchange="this.form.submit()">
                                    <option value="">Sort By</option>
                                    <option value="title">Name</option>
                                    <option value="amount">Amount (Low to High)</option>
                                    <option value="amount-high">Amount (High to Low)</option>
                                </select>
                                &nbsp;&nbsp;
                            <input type="text" class=" form-control" name="search" id="search" placeholder="Search">
                            &nbsp;
                            <button class=" btn btn-success" type="submit">Search</button>
                            
                        </form>

                </div>
               
                <div class="card-body">
                    <div class="d-flex">
                        <a href="{{ url('/resort-management/create') }}"><button class="btn btn-success">Add New Resort</button></a>
                       
                    </div>

                    
                    <table class="table align-middle">
                    
                        <thead>
                            <tr class="text-center">
                                <th scope="col">S.N.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Amount/Night</th>
                                <th scope="col">Details</th>
                                <th scope="col">Image</th>
                                <th scope="col" colspan="3">Actions</th>
                               



                            </tr>
                        </thead>
                        <tbody>

                            @foreach($resorts as $index=>$resort)
                            <tr class="text-center">
                                <td>{{ $index+$resorts->firstItem() }}</td>
                                <td>{{ $resort->title }}</td>
                                <td>{{ $resort->amount }}</td>
                                <td>{{ $resort->details }}</td>
                                <td><img height="80px" width="80px" src="Resort-images/{{ $resort->image}}" alt="{{ $resort->image }}"></td>
                                <td><a href="{{ url('resort-management/'.$resort->id) }}"><button class="btn btn-primary">View</button></a></td>
                                <td><a href="{{url('resort-management/'.$resort->id.'/edit')}}"><button class="btn btn-success">Edit</button></a></td>
                                <td>
                                    <form action="{{ url('resort-management/'.$resort->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <form>
            Show
            <select name="show_no_of_results" id="show_no_of_results" onchange="this.form.submit()">
                <option value="5" {{ request('show_no_of_results') ==5 ? "selected" : "" }}>5</option>
                <option value="10" {{ request('show_no_of_results') ==10 ? "selected" : "" }}>10</option>
                <option value="15" {{ request('show_no_of_results') ==15 ? "selected" : "" }}>15</option>
            </select> Per Page
        </form>
                    {{$resorts->links('pagination::bootstrap-5')}}
                </div>

                @endsection