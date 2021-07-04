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
                        <h4 class="card-title">All Home Services</h4>
                        <a href="{{ route('services.create') }}" class="btn btn-sm btn-success">Create New Service</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Icon</th>
                                        <th>Content</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($services as $data)
                                        <tr>
                                            <td>{{ $loop -> index + 1 }}</td>
                                            <td>{{ $data -> name }}</td>
                                            <td>{{ $data -> iconname }}</td>
                                            <td>{{ $data -> content }}</td>
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






        </div>



    </div>
</div>
@endsection
