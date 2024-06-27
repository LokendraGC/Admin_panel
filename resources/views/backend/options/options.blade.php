@extends('backend.layouts.app')

@section('main-section')

<style>
    .card-primary.card-outline {
        border-top: none !important;
    }
</style>

    <!-- External stylesheet for CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Profile Information</h3>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="info-tab" data-toggle="pill" href="#info"
                                        role="tab" aria-controls="info" aria-selected="true">Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="home-tab" data-toggle="pill" href="#home" role="tab"
                                        aria-controls="home" aria-selected="false">Header</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="pill" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">Footer</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="social-tab" data-toggle="pill" href="#social" role="tab"
                                        aria-controls="social" aria-selected="false">Social Handles</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="custom-content-below-tabContent">

                                {{-- Info --}}
                                <div class="tab-pane fade show active" id="info" role="tabpanel"
                                    aria-labelledby="info-tab">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6 my-3">
                                                <form>
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" id="email"
                                                            placeholder="Enter email">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6 my-3">
                                                <form>
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="phone">Phone</label>
                                                        <input type="number" class="form-control" id="phone"
                                                            placeholder="Enter Phone">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-12">
                                                <form>
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="text" class="form-control" id="address"
                                                            placeholder="Enter address">
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <label for="operating_time">Operating Time</label>
                                                        <input type="text" class="form-control" id="operating_time"
                                                               placeholder="Operating time">
                                                    </div> --}}


                                                    <div class="form-group">
                                                        <label for="exampleInputMap">Map</label>
                                                        <textarea class="form-control" id="exampleInputMap" placeholder="Map link" style="height: 150px"></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.container-fluid -->
                                </div>

                                {{-- Header --}}
                                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form>
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="header_logo">Header Logo</label>
                                                        <input type="file" class="form-control-file" id="header_logo"
                                                            name="header_logo">
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.container-fluid -->
                                </div>

                                {{-- Footer --}}
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6 my-3">
                                                <form>
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="footer_description">Description</label>
                                                        <textarea class="form-control" id="footer_description" placeholder="Footer description" style="height: 150px"></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form>
                                                    @csrf
                                                    <div class="form-group" style="margin-top: 20px">
                                                        <label for="footer_logo">Footer Logo</label>
                                                        <input type="file" class="form-control-file" id="footer_logo"
                                                            name="footer_logo">
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.container-fluid -->
                                </div>

                                {{-- Social Handles --}}
                                <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form>
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="facebook_url">Facebook URL</label>
                                                        <input type="url" class="form-control" id="facebook_url"
                                                            placeholder="Enter Facebook URL">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="twitter_url">Twitter URL</label>
                                                        <input type="url" class="form-control" id="twitter_url"
                                                            placeholder="Enter Twitter URL">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="instagram_url">Instagram URL</label>
                                                        <input type="url" class="form-control" id="instagram_url"
                                                            placeholder="Enter Instagram URL">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="linkedin_url">LinkedIn URL</label>
                                                        <input type="url" class="form-control" id="linkedin_url"
                                                            placeholder="Enter LinkedIn URL">
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.container-fluid -->
                                </div>

                            </div><!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col-lg-9 -->

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn bg-gradient-primary">Update</button>
                        </div>
                    </div>
                </div><!-- /.col-lg-3 -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
@endsection
