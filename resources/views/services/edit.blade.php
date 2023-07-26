@extends('layouts.app')

@section('content')
    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">Edit Service</h3></div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Main Page</a></li>
                    <li class="breadcrumb-item active">Edit Service</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <!-- /# row -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-title">
                            <h4>Service</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('services.update', $service) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ $service->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle">Sub-title</label>
                                        <input type="text" name="subtitle" id="subtitle" class="form-control" placeholder="Sub-title" value="{{ $service->subtitle }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="icon">Icon</label>
                                        <div class="pb-3">
                                            <img src="{{ url('storage/' . $service->icon) }}" alt="Icon" width="100px">
                                        </div>
                                        <input type="file" name="icon" id="icon" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="0" @selected($service->status == 0)>Inactive</option>
                                            <option value="1" @selected($service->status == 1)>Active</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-default">Update Service</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <!-- End PAge Content -->
        </div>
        <!-- End Container fluid  -->
    </div>
    <!-- End Page wrapper  -->
@endsection
