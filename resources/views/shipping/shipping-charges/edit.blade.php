@extends('layouts.app')

@section('content')
    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">Edit Shipping Charge</h3></div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Edit Shipping Charge</li>
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
                            <h4>Shipping Charge</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('shippingCharges.update', $shipping_charge) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="country">Name</label>
                                        <input type="text" name="country" id="country" class="form-control" placeholder="Country" value="{{ $shipping_charge->country }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="shipping_charge">Shipping Charge</label>
                                        <input type="number" name="shipping_charge" id="shipping_charge" class="form-control" placeholder="Shipping Charge" value="{{ $shipping_charge->shipping_charge }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Cash on Delivery</label>
                                        <select class="form-control" name="cash_on_delivery">
                                            <option value="0" @selected($shipping_charge->cash_on_delivery == 0)>Inactive</option>
                                            <option value="1" @selected($shipping_charge->cash_on_delivery == 1)>Active</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-default">Update Shipping Charge</button>
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
