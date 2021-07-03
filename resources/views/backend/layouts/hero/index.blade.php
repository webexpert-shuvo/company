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
                        <h4 class="card-title">All Slider</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($alldata as $data)
                                        <tr>
                                            <td>{{ $loop -> index + 1 }}</td>
                                            <td>{{ $data -> name }}</td>
                                            <td>{{ $data -> content }}</td>
                                            <td><img src="{{ URL::to('') }}/backend/assets/img/slider/{{ $data -> image ->  imagename }}" alt=" "  style="width: 80px; height:100px;" ></td>
                                            <td>{{ $data -> created_at ->diffForHumans() }}</td>
                                            <td><a href="{{ route('hero.edit' ,$data -> id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a> <a href="{{ route('hero.delete' ,$data -> id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
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
                        <h3>Add New Slider</h3>
                    </div>
                    <div class="card-body">

                        @error('name')
                            <p class="alert alert-danger">{{ $message }}<button class="close" data-dismiss="alert">&times;</button></p>
                        @enderror

                        @if (session('success'))
                         <p class="alert alert-success">{{ session('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
                        @endif

                        <form action="{{ route('hero.create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input name="name" class="form-control" type="text" placeholder="Slider Title" autocomplete="off" >
                            </div>
                            <div class="form-group">
                                <textarea name="content" id="" cols="30" rows="4" class="form-control" placeholder="Type Here" autocomplete="off"></textarea>
                            </div>

                            <div class="form-group">
                                <input name="buttontext" class="form-control" type="text" placeholder="Read More" autocomplete="off" >
                            </div>

                            <div class="form-group">
                                <input name="buttonurl" class="form-control" type="text" placeholder="Button Url" autocomplete="off" >
                            </div>

                            <div class="form-group">
                                <label for="slider_image">Slider Image</label> <br>
                                <input name="photo" type="file" id="slider_image">
                            </div>
                            <div class="form-group">
                                <input  class="btn btn-sm btn-success" type="submit" value="Add Slider" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>



    </div>
</div>
@endsection
