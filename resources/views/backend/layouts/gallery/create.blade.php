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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add New Gallery</h3>
                        <a href="{{ route('show.gallery') }}" class="btn btn-sm btn-success">All Gallery</a>
                    </div>
                    <div class="card-body">

                        @error('name')
                            <p class="alert alert-danger">{{ $message }}<button class="close" data-dismiss="alert">&times;</button></p>
                        @enderror

                        @if (session('success'))
                         <p class="alert alert-success">{{ session('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
                        @endif

                        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input name="name" class="form-control" type="text" placeholder="Service Title" autocomplete="off" >
                            </div>

                            <div class="form-group">
                                <input name="photo[]" class="form-control" type="file" multiple >
                            </div>

                            <div class="form-group">
                                <input  class="btn btn-sm btn-success" type="submit" value="Add Gallery" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>




        </div>



    </div>
</div>
@endsection
