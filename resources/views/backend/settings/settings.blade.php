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
                    <h1>General Settings</h1>
                </div>
                <div class="col-sm-6">
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <form class="form-horizontal" action="{{ route('admin.settings.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <!-- general form elements -->
                        <div class="card card-info">
                            <!-- form start -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="site_title" class="col-sm-3 col-form-label">Site Title*</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="site_title" name="site_title" value="{{$setting_data['site_title']}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="site_favicon" class="col-sm-3 col-form-label">Site Favicon</label>
                                    {{-- <a href=""><i class="fa-solid fa-delete-left delete"></i></a> --}}

                                    <div class="col-sm-9">
                                        <div class="file-preview-item">
                                            <button onclick="removeNode(this)" data-name="site_favicon"
                                                class="btn btn-sm btn-link remove-attachment" type="button">
                                                <i class="fa-solid fa-delete-left site_fav_delete append"></i>
                                            </button>
                                            @if (isset($setting_data['site_favicon']))
                                                <img src="{{ asset('storage/' . $setting_data['site_favicon']) }}"
                                                    alt="Site Icon" style="max-width: 100px; margin-bottom: 10px;">
                                            @else
                                                <p>No Site favicon image uploaded.</p>
                                            @endif
                                        </div>
                                        <input type="file" class="form-control-file"
                                            name="site_favicon" accept="image/*" value="{{$setting_data['site_favicon']}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="adminstration_email" class="col-sm-3 col-form-label">Administration Email
                                        Address*</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="adminstration_email"
                                            name="adminstration_email" value="{{$setting_data['adminstration_email']}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="featured_image" class="col-sm-3 col-form-label">Select Homepage*</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="select_homepage" style="max-width: fit-content;"
                                            name="select_homepage">
                                            @foreach (\App\Enums\TemplateType::getKeyValuePairs() as $label => $value)
                                                <option  value="{{ $value }}"
                                                @if ($value == $setting_data['select_homepage'])
                                                    selected
                                                @endif
                                                >{{ $label }}
                                                </option>
                                        @endforeach
                                        </select>
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
