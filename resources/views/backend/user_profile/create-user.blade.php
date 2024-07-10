@extends('backend.layouts.app')

<style>
    .site_fav_delete {
        color: red;
        font-size: 20px;
        cursor: pointer;
        bottom: 90%;
        right: 85%;
        position: absolute;
    }
</style>

@section('main-section')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create User</h1>
                </div>
                <div class="col-sm-6">
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <form class="form-horizontal" action="{{ route('user.register') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <!-- general form elements -->
                        <div class="card card-info">
                            <!-- form start -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name">
                                        @error('name')
                                            <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="email" name="email">
                                        @error('email')
                                            <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="password" name="password">
                                        @error('password')
                                            <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="confirm_password" class="col-sm-3 col-form-label">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="confirm_password"
                                            name="password_confirmation">
                                        @error('password')
                                            <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn bg-gradient-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
