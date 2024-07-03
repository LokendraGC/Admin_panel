@extends('backend.layouts.app')

<style>
    a.text-primary:hover,
    a.text-primary:focus {
        color: #5e3391 !important;
        text-decoration: underline;
    }

    a.text-danger:hover,
    a.text-danger:focus {
        text-decoration: underline;
    }

    .dataTables_filter {
        text-align: right;
        padding-right: 15px;
    }

    .dataTables_filter label {
        display: inline-block;
        margin-bottom: .5rem;
        gap: 9px;
        display: inline-flex;
    }

    .pagination {
        display: -ms-flexbox;
        display: flex;
        justify-content: end;
        padding-left: 0;
        list-style: none;
        border-radius: .25rem;
        margin-right: 15px;
    }

    tr.odd {
        cursor: pointer;
    }

    tr.even {
        cursor: pointer;
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

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('user.register') }}" method="POST">
                @csrf
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-4">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Your Name"
                                        name="name">
                                    @error('title')
                                        <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Add Email"
                                        name="email">
                                    @error('email')
                                        <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Add Password"
                                        name="password">
                                    @error('password')
                                        <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password"
                                        name="password_confirmation">
                                    @error('password')
                                        <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn bg-gradient-primary">Register</button>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </form>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
