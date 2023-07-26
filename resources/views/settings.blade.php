@extends('layouts.app')

@section('content')
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Settings</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-b-0">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#site-details"
                                            role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span
                                                class="hidden-xs-down">Site Details</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#password"
                                            role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span
                                                class="hidden-xs-down">Password</span></a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="site-details" role="tabpanel">
                                        <!-- /# row -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="pt-4">
                                                    <div class="card-body">
                                                        <div class="basic-elements">
                                                            <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="company_name">Company Name</label>
                                                                            <input type="text" name="company_name"
                                                                                id="company_name" class="form-control"
                                                                                value="{{ $settings['company_name'] }}"
                                                                                placeholder="Company Name">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="app_title">App Title</label>
                                                                            <input type="text" name="app_title"
                                                                                id="app_title" class="form-control"
                                                                                value="{{ $settings['app_title'] }}"
                                                                                placeholder="App Title">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="primary_email">Primary Email</label>
                                                                            <input type="email" name="primary_email"
                                                                                id="primary_email" class="form-control"
                                                                                value="{{ $settings['primary_email'] }}"
                                                                                placeholder="e.g. example@example.com">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="secondary_email">Secondary
                                                                                Email</label>
                                                                            <input type="email" name="secondary_email"
                                                                                id="secondary_email" class="form-control"
                                                                                value="{{ $settings['secondary_email'] }}"
                                                                                placeholder="e.g. example@example.com">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="primary_phone">Primary Phone</label>
                                                                            <input type="tel" name="primary_phone"
                                                                                id="primary_phone" class="form-control"
                                                                                pattern="[0-9]{5}-[0-9]{6}"
                                                                                value="{{ $settings['primary_phone'] }}"
                                                                                placeholder="e.g. 01XXX-XXXXX">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="secondary_phone">Secondary
                                                                                Phone</label>
                                                                            <input type="tel" name="secondary_phone"
                                                                                id="secondary_phone" class="form-control"
                                                                                pattern="[0-9]{5}-[0-9]{6}"
                                                                                value="{{ $settings['secondary_phone'] }}"
                                                                                placeholder="e.g. 01XXX-XXXXX">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="address">Address</label>
                                                                            <input type="text" name="address"
                                                                                id="address" class="form-control"
                                                                                value="{{ $settings['address'] }}"
                                                                                placeholder="Address">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="about_us">About Us</label>
                                                                            <input type="text" name="about_us"
                                                                                id="about_us" class="form-control"
                                                                                value="{{ $settings['about_us'] }}"
                                                                                placeholder="e.g. We are the best">
                                                                        </div>
                                                                        <button type="submit"
                                                                            class="btn btn-default">Save</button>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="currency">Currency</label>
                                                                            <input type="text" name="currency"
                                                                                id="currency" class="form-control"
                                                                                value="{{ $settings['currency'] }}"
                                                                                placeholder="e.g. Dollar">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="currency_symbol">Currency
                                                                                Symbol</label>
                                                                            <input type="text" name="currency_symbol"
                                                                                id="currency_symbol" class="form-control"
                                                                                value="{{ $settings['currency_symbol'] }}"
                                                                                placeholder="e.g. $">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="shipping_charge">Default Shipping
                                                                                Charge</label>
                                                                            <input type="number" name="shipping_charge"
                                                                                id="shipping_charge" class="form-control"
                                                                                value="{{ $settings['shipping_charge'] }}"
                                                                                placeholder="e.g. 200">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="vat">VAT (%)</label>
                                                                            <input type="number" name="vat"
                                                                                id="vat" class="form-control"
                                                                                value="{{ $settings['vat'] }}"
                                                                                placeholder="e.g. 7">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="site_url">Main Site URL</label>
                                                                            <input type="text" name="site_url"
                                                                                id="site_url" class="form-control"
                                                                                value="{{ $settings['site_url'] }}"
                                                                                placeholder="e.g. https://website.com">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="site_logo">Site Logo</label>
                                                                            <div class="pb-3">
                                                                                <img src="{{ url('storage/' . $settings['site_logo']) }}" alt="Site Logo" width="100px">
                                                                            </div>
                                                                            <input type="file" name="site_logo"
                                                                                id="site_logo" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /# column -->
                                        </div>
                                        <!-- /# row -->
                                    </div>
                                    <div class="tab-pane" id="password" role="tabpanel">
                                        <!-- /# row -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="pt-4">
                                                    <div class="card-body">
                                                        <div class="basic-elements">
                                                            <form action="{{ route('password.update') }}" method="POST">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="current_password">Current Password</label>
                                                                            <input type="password" name="current_password"
                                                                                id="current_password" class="form-control"
                                                                                placeholder="Current Password">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="password">New Password</label>
                                                                            <input type="password" name="password"
                                                                                id="password" class="form-control"
                                                                                placeholder="New Password">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="password_confirmation">Confirm Password</label>
                                                                            <input type="password" name="password_confirmation"
                                                                                id="password_confirmation" class="form-control"
                                                                                placeholder="Confirm Password">
                                                                        </div>
                                                                        <button type="submit"
                                                                            class="btn btn-default">Save</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /# column -->
                                        </div>
                                        <!-- /# row -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
@endsection
