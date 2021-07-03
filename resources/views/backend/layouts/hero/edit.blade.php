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
                    <h3 class="page-title">Welcome Admin!</h3>
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
                        <h4>Edit Your Category</h4>
                        <a href="{{ route('show.hero') }} " class="btn btn-sm btn-success">All Slider</a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <p class="alert alert-success">{{ session('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
                        @endif

                        <form action="{{ route('hero.update' ,$herodata -> id ) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <input type="text" name="name" value="{{ $herodata -> name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="content" value="{{ $herodata -> content }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="buttontext" value="{{ $herodata -> buttontext }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="url" value="{{ $herodata -> url }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <img src="{{ URL::to('') }}/backend/assets/img/slider/{{ $herodata -> image-> imagename }}" alt="" style="width: 100%; height: 500px;"> <br>
                                <br>
                                <input type="file" name="photo" >
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-sm btn-success">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
