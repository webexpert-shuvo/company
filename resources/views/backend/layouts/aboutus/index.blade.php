@extends('backend.layouts.app.app')

@section('backend-content')
<div class="page-wrapper">

    <div class="content container-fluid">

        <!-- Header -->
            @include('backend.layouts.app.header')
			<!-- /Header -->

			<!-- Sidebar -->
            @include('backend.layouts.app.menu')
			<!-- /Sidebar -->

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Welcome {{ Auth::user()-> name }}!</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">About Us Section</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr style="width: 100% ; overflow: hidden;;">
                                        <th style="width: 5% !important" >Title</th>
                                        <th style="width: 30% !important" >Content</th>
                                        <th style="width: 60% !important" >Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($aboutusdata as $data)
                                        <tr>
                                            <td>{{ $data -> name }}</td>
                                            <td>{{ $data -> content }}</td>
                                            <td>{!! htmlspecialchars_decode($data -> description) !!}</td>
                                            <td><a href="{{ route('aboutus.edit' ,$data -> id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a> <a href="{{ route('aboutus.delete' ,$data -> id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Upload About Us Section</h3>
                    </div>
                    <div class="card-body">

                        @error('name')
                            <p class="alert alert-danger">{{ $message }}<button class="close" data-dismiss="alert">&times;</button></p>
                        @enderror

                        @if (session('success'))
                         <p class="alert alert-success">{{ session('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
                        @endif

                        <form action="{{ route('aboutus.create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input name="name" class="form-control" type="text" placeholder="About Us Title" autocomplete="off" >
                            </div>
                            <div class="form-group">
                                <textarea name="content" id="" cols="30" rows="4" class="form-control" placeholder="Short Content Type Here" autocomplete="off"></textarea>
                            </div>
                            <div class="form-group">
                                <textarea name="aboutsection" id="" cols="30" rows="4" class="form-control" placeholder="Type Here" autocomplete="off"></textarea>
                            </div>

                            <div class="form-group">
                                <input  class="btn btn-sm btn-success" type="submit" value="Add Content" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>



    </div>
</div>
@endsection
