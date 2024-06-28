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
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5">
                    <div class="card"><grammarly-extension data-grammarly-shadow-root="true"
                            style="position: absolute; top: -1px; left: -1px; pointer-events: none;"
                            class="dnXmp"></grammarly-extension><grammarly-extension data-grammarly-shadow-root="true"
                            style="position: absolute; top: -1px; left: -1px; pointer-events: none;"
                            class="dnXmp"></grammarly-extension>
                        <div class="card-body">
                            <h4 class="card-title">Add New Category</h4>
                            <hr>
                            <form class="forms-sample" action="{{ route('admin.post.category.store') }}" method="POST">
                                @csrf


                                <div class="form-group">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" required="">
                                    <div class="invalid-feedback d-block ">
                                    </div>
                                    <p class="fields_note">The name is how it appears on your site.</p>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug">
                                </div>
                                <div class="form-group d-none">
                                    <label for="parent">Parent</label>
                                    <select class="form-control" id="parent" style="max-width: fit-content;"
                                        name="parent">
                                        <option value="0">None</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="content">Description</label>
                                    <textarea class="form-control" rows="5" name="content" spellcheck="false"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="header_logo">Header Logo</label>
                                    <input type="file" class="form-control-file" id="header_logo" name="header_logo">
                                </div>
                                <div class="form-group">
                                    <label for="menuOrder">Order</label>
                                    <input type="number" class="form-control" id="menuOrder" name="menu_order"
                                        value="0">
                                </div>

                                {{-- <a class="btn bg-gradient-primary" href="http://adminlte.test/admin/post/create">Add New
                                    Category</a> --}}

                                <button type="submit" class="btn bg-gradient-primary"
                                    href="http://adminlte.test/admin/post/create">Add New
                                    Category</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card">

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

                                    @foreach ($categories as $category)
                                        <tr>
                                            <td><span>{{ $category->title }}</span>
                                                <br>
                                                <div class="row-action">
                                                    <span class="edit">
                                                        <a href="{{ route('admin.post.category.edit', $category->id) }}"
                                                            class="text-primary">Edit</a>
                                                    </span>
                                                    <span class="delete">
                                                        |
                                                        <a href="{{ route('admin.category.post.destroy', $category->id) }}"
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

                                            <td>Win 95+</td>
                                            <td>Win 95+</td>

                                        </tr>
                                    @endforeach


                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
