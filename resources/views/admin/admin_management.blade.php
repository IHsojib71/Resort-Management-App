@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(session('status'))
                <span class="alert alert-success mx-auto" style="text-align: right;display:block;">{{session('status')}}</span>
                @endif
            <div class="card">
           
                <div class="card-header">
                    <h5>Admins</h5>
                </div>
               
                <div class="card-body">

                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
                        Add New Admin
                    </button>
                @include('admin.new_admin_modal')
                
                    <!-- filter -->
                    <form class="d-flex float-end">
                                <select name="admin_sort_by" id="admin_sort_by" class=" form-control" onchange="this.form.submit()">
                                    <option value="">Sort By</option>
                                    <option value="name">Name</option>
                                    <option value="email">Email</option>
                                </select>
                                &nbsp;&nbsp;
                            <input type="text" class=" form-control" name="admin_search" id="admin_search" placeholder="Search">
                            &nbsp;
                            <button class=" btn btn-success" type="submit">Search</button>
                        </form>
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">S.N.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col" colspan="2">Actions</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_admins as $index=>$admins)

                            <tr class="text-center">
                                <td>{{ $index+$all_admins->firstItem() }}</td>
                                <td>{{ $admins->name }}</td>
                                <td>{{ $admins->email }}</td>
                                <td><a href="{{url('/admin-management/'.$admins->id.'/edit')}}"><button class="btn btn-success">Edit</button></a></td>
                                <td>
                                <form action="{{ url('admin-management/'.$admins->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                        </form>    
                                
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
                    {{$all_admins->links('pagination::bootstrap-5')}}

                </div>


                @endsection