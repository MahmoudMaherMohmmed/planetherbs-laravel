@extends('admin.layouts.app')

@section('title') Social Links @endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('admin')}}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css"/>

    <link rel="stylesheet" href="{{asset('admin')}}/plugins/dropify/css/dropify.min.css">
@endsection

@section('content')
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Social Links</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">General Settings</a></li>
                        <li class="breadcrumb-item active">{{isset($item) ? 'Edit Social Link' : 'New Social Link'}}</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                    <a href="{{route('sociallinks.index')}}" class="btn btn-warning btn-icon float-right"><i
                            class="zmdi zmdi-mail-reply"></i></a>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form id="form_advanced_validation"
                                  class="form-horizontal"
                                  method="POST"
                                  action="{{ isset($item) ? route('sociallinks.update',$item->id) : route('sociallinks.store') }}"
                                  enctype="multipart/form-data">

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if(session()->has('msg'))
                                    <div class="alert alert-success">
                                        {{ session()->get('msg') }}
                                    </div>
                                @endif

                                @csrf

                                @isset($item)
                                    <input type="hidden" name="_method" value="PUT"/>
                                @endisset

                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label>Title</label>
                                        <div class="form-group form-float">
                                            <input type="text" class="form-control" name="title"
                                                   value="{{ isset($item) ? $item->title : old('title') }}"
                                                   placeholder="Social Link Title"
                                                   minlength="3" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Link</label>
                                        <div class="form-group form-float">
                                            <input type="url" class="form-control" name="link"
                                                   value="{{ isset($item) ? $item->link : old('link') }}"
                                                   placeholder="Link"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Class</label>
                                        <div class="form-group form-float">
                                            <input type="text" class="form-control" name="class"
                                                   value="{{ isset($item) ? $item->class : old('class') }}"
                                                   placeholder="Social Link Class"
                                                   minlength="3" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Icon</label>
                                        <div class="form-group form-float">
                                            <input type="text" class="form-control" name="icon"
                                                   value="{{ isset($item) ? $item->icon : old('icon') }}"
                                                   placeholder="Social Link Icon"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label style="margin-bottom: 0px;">Color</label>
                                        <div class="form-group form-float">
                                            <div class="input-group colorpicker">
                                                <input type="text" class="form-control" name="color"
                                                       value={{ isset($item) ? $item->color : '#0000' }}
                                                           required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><span
                                                            class="input-group-addon"> <i></i> </span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label>Status</label>
                                        <div class="form-group form-float">
                                            <select name="status" class="form-control show-tick ms"
                                                    data-placeholder="Select">
                                                <option
                                                    value="-1" {{ isset($item) && $item->status == 1 ? "disabled" : "" }}>
                                                    -- Choose Status --
                                                </option>
                                                <option
                                                    value="1" {{ isset($item) && $item->status == 1 ? "Selected" : "" }}>
                                                    ON
                                                </option>
                                                <option
                                                    value="0" {{ isset($item) && $item->status == 0 ? "Selected" : "" }}>
                                                    OFF
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button class=" btn btn-raised btn-primary waves-effect" type="submit">
                                            SUBMIT
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Plugin Js -->
    <script src="{{asset('admin')}}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-validation/jquery.validate.js"></script>
    <script src="{{asset('admin')}}/plugins/dropify/js/dropify.min.js"></script>
    <script src="{{asset('admin')}}/plugins/select2/select2.min.js"></script>
    <script src="{{asset('admin')}}/plugins/multi-select/js/jquery.multi-select.js"></script>
    <script src="{{asset('admin')}}/plugins/nouislider/nouislider.js"></script>
    <script src="{{asset('admin')}}/bundles/mainscripts.bundle.js"></script>
    <script src="{{asset('admin')}}/js/pages/forms/form-validation.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    <script src="{{asset('admin')}}/js/pages/forms/dropify.js"></script>
    <script src="{{asset('admin')}}/js/pages/forms/advanced-form-elements.js"></script>
@endsection
