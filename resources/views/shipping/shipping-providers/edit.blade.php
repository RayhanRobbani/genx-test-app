@extends('layouts.app')

@section('content')
    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">Edit Shipping Provider</h3></div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Shipping</a></li>
                    <li class="breadcrumb-item active">Edit Shipping Provider</li>
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
                            <h4>Shipping Provider</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('shippingProviders.update', $shipping_provider) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $shipping_provider->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="logo">Logo</label>
                                        <div class="pb-3">
                                            <img src="{{ url('storage/' . $shipping_provider->logo) }}" alt="Shipping Provider Logo" width="100px">
                                        </div>
                                        <input type="file" name="logo" id="logo" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="delivery_days_local">Delivery Days (Local)</label>
                                        <input type="number" name="delivery_days_local" id="delivery_days_local" class="form-control" placeholder="Delivery Days (Local)" value="{{ $shipping_provider->delivery_days_local }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="delivery_days_outside">Delivery Days (Outside)</label>
                                        <input type="number" name="delivery_days_outside" id="delivery_days_outside" class="form-control" placeholder="Delivery Days (Outside)" value="{{ $shipping_provider->delivery_days_outside }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="0" @selected($shipping_provider->status == 0)>Inactive</option>
                                            <option value="1" @selected($shipping_provider->status == 1)>Active</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-default">Update Shipping Provider</button>
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
