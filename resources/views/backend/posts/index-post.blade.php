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
                    <h1>All Posts</h1>
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
                            <a class="btn bg-gradient-primary" href="http://adminlte.test/admin/post/create">Add New
                                Post</a>
                            <hr>
                            <div class="forms-sample">
                                <div class="pl-4">
                                    <div class="row flex-column flex-md-row justify-content-md-between">
                                        <div class="d-flex flex-wrap">
                                            <div class="row-action">
                                                <span class="edit">
                                                    <a href="" class="text-primary"><span
                                                            class="text-black fw-700">All (8)</span></a>
                                                </span>
                                                <span class="view">
                                                    |
                                                    <a target="_self" href="" class="text-primary">Published
                                                        (8)</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-group d-none">
                                                <input type="text" class="form-control" placeholder="Search Pages">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1"
                                class="table table-striped project-orders-table data__table dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($posts as $post)
                                        <tr>
                                            <td><span>{{ $post->title }}</span>
                                                <br>
                                                <div class="row-action">
                                                    <span class="edit">
                                                        <a href="{{ route('admin.post.edit', $post->id) }}"
                                                            class="text-primary">Edit</a>
                                                    </span>
                                                    <span class="delete">
                                                        |
                                                        <a href="{{ route('admin.post.destroy',$post->id) }}"
                                                            onclick="return confirm('Are you sure you want to delete?');"
                                                            class="text-danger">Trash</a>
                                                    </span>
                                                    <span class="view">
                                                        |
                                                        <a target="_blank" href="http://osteo.test/about"
                                                            class="text-primary">View</a>
                                                    </span>
                                                </div>
                                            </td>

                                            <td>{{ $post->slug }}</td>
                                            <td>{{ $post->created_at }}</td>

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
    <!-- /.content -->
@endsection
