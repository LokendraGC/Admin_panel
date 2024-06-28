@extends('backend.layouts.app')


@section('main-section')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Post</h1>
                </div>
                <div class="col-sm-6">

                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.post.store') }}" method="POST">
                @csrf
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8">
                        <!-- general form elements -->
                        <div class="card card-primary">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" class="form-control" id="title" placeholder="Add title"
                                        name="title">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" placeholder="Add slug"
                                        name="slug">
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="editor" name="content"></textarea>
                                </div>
                            </div>


                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    {{-- <label>Choose </label> --}}
                                    <select class="form-control select2" style="width: 100%;" name="status">
                                        <option  value="" selected="">Select Status</option>
                                        <option value="publish">publish</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="header_logo">Featured Image</label>
                                    <input type="file" class="form-control-file" id="header_logo" name="header_logo">
                                </div>

                                <div class="form-group">
                                    <label>Page Template</label>
                                    <select class="form-control select2" style="width: 100%;">
                                        <option selected="">Default</option>
                                        <option>Home</option>
                                        <option>About</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn bg-gradient-primary">Update</button>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            {{-- <div class="card-header">
                  <h3 class="card-title">Quick Example</h3>
                </div> --}}
                            <!-- /.card-header -->
                            <!-- form start -->

                            <div class="card-body">
                                <div class="card-header" style="margin-bottom: 10px">
                                    <h4>SEO</h4>
                                </div>
                                <div class="form-group">
                                    <label for="seo_title">SEO Title</label>
                                    <input type="text" class="form-control" id="seo_title" placeholder="Enter seo title">
                                </div>
                                <div class="form-group">
                                    <label for="metadescription">Meta Description</label>
                                    <textarea class="form-control" id="metadescription" rows="5" name="seo_description" spellcheck="false"></textarea>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </form>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
