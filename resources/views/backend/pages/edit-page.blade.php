@extends('backend.layouts.app')

<style>
    .delete {
        color: red;
        font-size: 20px;
        cursor: pointer;
        top: 30%;
        right: 253px;
        position: absolute;
    }
</style>

@section('main-section')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Page</h1>
                </div>
                <div class="col-sm-6">

                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('admin.page.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-9">
                        <!-- general form elements -->
                        <div class="card card-primary">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" class="form-control" id="title" placeholder="Add title"
                                        value="{{ $post->title }}" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" placeholder="Add slug"
                                        value="{{ $post->slug }} " name="slug">
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="editor" class="form-control" name="content">{{ $post->content }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    {{-- <label>Choose </label> --}}
                                    <select class="form-control select2" style="width: 100%;" name="status">
                                        <option>Select Status</option>
                                        <option value="publish" @if ($post->status == 'publish') selected @endif>Publish
                                        </option>
                                        <option value="draft" @if ($post->status == 'draft') selected @endif>Draft
                                        </option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                            data-target="#reservationdatetime" name="date_time" value="{{ $created_at }}" />
                                        <div class="input-group-append" data-target="#reservationdatetime"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="header_logo">Featured Image</label>
                                    {{-- <a href=""><i class="fa-solid fa-delete-left delete"></i></a> --}}

                                    <br>
                                    <div class="file-preview-item">
                                        <button onclick="removeNode(this)" data-name="featured_image"
                                            class="btn btn-sm btn-link remove-attachment" type="button">
                                            <i class="fa-solid fa-delete-left delete append"></i>
                                        </button>
                                        @if (isset($postMeta['featured_image']))
                                            <img src="{{ asset('storage/' . $postMeta['featured_image']) }}"
                                                alt="Featured Image" style="max-width: 100px; margin-bottom: 10px;">
                                        @else
                                            <p>No featured image uploaded.</p>
                                        @endif
                                    </div>
                                    <input type="file" class="form-control-file" id="featured_image"
                                        name="featured_image" accept="image/*">


                                </div>

                                <div class="form-group">
                                    <label>Page Template</label>
                                    <select class="form-control select2" style="width: 100%;" name="page_template">
                                        @foreach (\App\Enums\TemplateType::getKeyValuePairs() as $label => $value)
                                            @if ($value != 'home')
                                                <option value="{{ $value }}"
                                                @if ($value == $postMeta['page_template'])
                                                    selected
                                                @endif
                                                >{{ $label }}
                                                </option>
                                            @endif
                                        @endforeach

                                        {{-- @foreach ($pages as $page)
                                        <option @if ($post->title == $page->title) selected @endif
                                            value="{{ $page->title }}">{{ $page->title }}
                                        </option>
                                    @endforeach --}}

                                    </select>
                                </div>
                                    <div class="d-flex justify-content-between ">
                                    <p class="">
                                        <a class="btn btn-outline-primary" href=""
                                            target="_blank">View</a>
                                    </p>
                                    <p class="">
                                        <button type="submit" class="btn bg-gradient-primary">Update</button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-9">
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
                                    <input type="text" class="form-control" id="seo_title" placeholder="Enter seo title"
                                        name="seo_title" value="{{ $postMeta['seo_title'] }}">
                                </div>
                                <div class="form-group">
                                    <label for="metadescription">Meta Description</label>
                                    <textarea class="form-control" id="metadescription" rows="5" name="seo_description" spellcheck="false">{{ $postMeta['seo_description'] }}</textarea>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </form>
    </section>

    <script src="{{ asset('../../plugins/jquery/jquery.min.js') }}"></script>
    <script>
        $(function() {
            // Initialize Summernote with initial height
            $('.editor').summernote({
                height: 300, // Initial height in pixels
            });

            // Function to change Summernote height
            function changeSummernoteHeight(height) {
                $('.editor').summernote('option', 'height', height);
            }

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
    <!-- /.content -->
@endsection
