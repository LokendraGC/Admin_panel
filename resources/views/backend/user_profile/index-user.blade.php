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

    .dataTables_filter
     {
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

    .main-footer
    {
        bottom: 0px;
    }

    footer.main-footer
    {
    position: absolute;
    left: 0;
    right: 0px;
}
</style>

@section('main-section')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All User</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn bg-gradient-primary" href="{{ route('user.register') }}">Add User</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1"
                                class="table table-striped project-orders-table data__table dataTable no-footer">
                                <div>
                                    @session('success')
                                        <p text-primary text-center>{{ session('success') }}</p>
                                    @endsession
                                </div>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $user)
                                        <tr style="cursor: pointer">
                                            <td><span>{{ $user->name }}</span>
                                                <br>
                                                <div class="row-action">
                                                    <span class="edit">
                                                        <a href="{{ route('admin.user.edit', $user->id) }}"
                                                            class="text-primary">Edit</a>
                                                    </span>
                                                </div>
                                                <div class="row-action">
                                                </div>
                                            </td>

                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at }}</td>

                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content
@endsection
