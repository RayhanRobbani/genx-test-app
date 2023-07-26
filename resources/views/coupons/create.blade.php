@extends('layouts.app')

@section('content')
    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">Create Coupon</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Create Coupon</li>
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
                            <h4>Coupon</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('coupons.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="code">Code</label>
                                        <input type="text" name="code" id="code" class="form-control"
                                            placeholder="Code">
                                    </div>
                                    <div class="form-group">
                                        <label for="value">Value</label>
                                        <input type="number" name="value" id="value" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Discount Type</label>
                                        <select class="form-control" name="discount_type">
                                            <option selected disabled>-- select --</option>
                                            <option value="flat">Flat</option>
                                            <option value="percentage">Percentage</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="coupon_usage_limit">Coupon Usage Limit</label>
                                        <input type="number" name="coupon_usage_limit" id="coupon_usage_limit" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="user_usage_limit">User Usage Limit</label>
                                        <input type="number" name="user_usage_limit" id="user_usage_limit" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="minimum_spend">Minimum Spend</label>
                                        <input type="number" name="minimum_spend" id="minimum_spend" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" name="start_date" id="start_date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">End Date</label>
                                        <input type="date" name="end_date" id="end_date" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-default">Add Coupon</button>
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
