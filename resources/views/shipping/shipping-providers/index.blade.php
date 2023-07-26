@extends('layouts.app')

@section('content')
    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">Shipping Providers</h3> </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Shipping Providers</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">
                <!-- /# column -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-title">
                            <h4>Shipping Providers</h4>
                            <a class="btn btn-rounded btn-secondary float-right" href="{{ route('shippingProviders.create') }}">Add Shipping Provider</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Delivery Days (Local)</th>
                                            <th>Delivery Days (Outside)</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($shipping_providers as $shipping_provider)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $shipping_provider->name }}</td>
                                                <td>
                                                    <img src="{{ url('storage/' . $shipping_provider->logo) }}" alt="Shipping Provider Logo" width="40px">
                                                </td>
                                                <td>{{ $shipping_provider->delivery_days_local }}</td>
                                                <td>{{ $shipping_provider->delivery_days_outside }}</td>
                                                @if ($shipping_provider->status)
                                                    <td><span class="badge badge-success">Active</span></td>
                                                @else
                                                    <td><span class="badge badge-danger">Inactive</span></td>
                                                @endif
                                                <td class="d-flex justify-content-end">
                                                    <a href="{{ route('shippingProviders.edit', $shipping_provider) }}" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5"><i class="ti-pencil"></i></a>
                                                    <form action="{{ route('shippingProviders.destroy', $shipping_provider) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5"><i class="ti-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No records found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /# row -->
            <!-- End PAge Content -->
        </div>
        <!-- End Container fluid  -->
    </div>
    <!-- End Page wrapper  -->
@endsection
