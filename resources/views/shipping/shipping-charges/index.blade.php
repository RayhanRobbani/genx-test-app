@extends('layouts.app')

@section('content')
    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">Shipping Charges</h3> </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Shipping</a></li>
                    <li class="breadcrumb-item active">Shipping Charges</li>
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
                            <h4>Shipping Charges</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Country</th>
                                            <th>Shipping Charge</th>
                                            <th>Cash on Delivery</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($shipping_charges as $shipping_charge)
                                            <tr>
                                                <th scope="row">{{ $shipping_charge->id }}</th>
                                                <td>{{ $shipping_charge->country }}</td>
                                                <td>{{ $shipping_charge->shipping_charge }}</td>
                                                @if ($shipping_charge->cash_on_delivery)
                                                    <td><span class="badge badge-success">Active</span></td>
                                                @else
                                                    <td><span class="badge badge-danger">Inactive</span></td>
                                                @endif
                                                <td class="d-flex justify-content-end">
                                                    <a href="{{ route('shippingCharges.edit', $shipping_charge) }}" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5"><i class="ti-pencil"></i></a>
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
                            <div class="mt-3 float-right">
                                {{ $shipping_charges->links() }}
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
