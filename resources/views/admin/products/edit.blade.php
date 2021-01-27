@extends('admin.layouts.app')

@section('title') Products @endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('admin')}}/plugins/dropify/css/dropify.min.css">
    <link rel="stylesheet" href="{{asset('admin')}}/plugins/summernote/dist/summernote.css">
@endsection

@section('content')
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Products</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Products</a></li>
                        <li class="breadcrumb-item active">{{isset($item) ? 'Edit Product' : 'New Product'}}</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                                class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                                class="zmdi zmdi-arrow-right"></i></button>
                    <a href="{{route('products.index')}}" class="btn btn-warning btn-icon float-right"><i
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
                                  action="{{ isset($item) ? route('products.update',$item->id) : route('products.store') }}"
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
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Title-AR</label>
                                        <div class="form-group form-float">
                                            <input type="text" class="form-control" name="title_ar"
                                                   value="{{ isset($item) ? getLangValue($item->title, 'ar') : old('title_ar') }}"
                                                   placeholder="Product Title-AR"
                                                   minlength="3" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Title-EN</label>
                                        <div class="form-group form-float">
                                            <input type="text" class="form-control" name="title_en"
                                                   value="{{ isset($item) ? getLangValue($item->title, 'en') : old('title_en') }}"
                                                   placeholder="Product Title-EN"
                                                   minlength="3" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label>Code</label>
                                        <div class="form-group form-float">
                                            <input type="text" class="form-control" name="code"
                                                   value="{{ isset($item) ? $item->code : old('code') }}"
                                                   placeholder="Product Code"
                                                   minlength="3" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Description-AR</label>
                                        <div class="form-group form-float">
                                            <textarea type="text" class="summernote" name="description_ar"
                                                      placeholder="Product Description-AR"
                                                      rows="8">{{ isset($item) ? getLangValue($item->description, 'ar') : old('description_ar') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Description-EN</label>
                                        <div class="form-group form-float">
                                            <textarea type="text" class="summernote" name="description_en"
                                                      placeholder="Product Description-EN"
                                                      rows="8">{{ isset($item) ? getLangValue($item->description, 'en') : old('description_en') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label>Categories</label>
                                        <div class="form-group form-float">
                                            <select name="category_id" class="form-control show-tick ms select2"
                                                    data-placeholder="Select">
                                                <option
                                                        value="-1" {{ isset($item) ? "disabled" : "" }}>
                                                    -- Choose Category --
                                                </option>
                                                @if(isset($categories) && $categories!=null)
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}" {{ isset($item) && $item->category_id == $category->id ? "Selected" : "" }}>
                                                            {{getDefaultValueKey($category->title)}}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label>Image</label>
                                        <div class="form-group form-float">
                                            <input type="file" class="dropify" name="image"
                                                   data-default-file="@isset($item){{ url('files/',$item->image) }}@endisset">
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label>Distinguish</label>
                                        <div class="form-group form-float">
                                            <select name="distinguish" class="form-control show-tick ms select2"
                                                    data-placeholder="Select">
                                                <option
                                                        value="0" {{ isset($item) && $item->distinguish == 0 ? "Selected" : "" }}>
                                                    NO
                                                </option>
                                                <option
                                                        value="1" {{ isset($item) && $item->distinguish == 1 ? "Selected" : "" }}>
                                                    YES
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label>Status</label>
                                        <div class="form-group form-float">
                                            <select name="status" class="form-control show-tick ms select2"
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
    <script src="{{asset('admin')}}/plugins/jquery-validation/jquery.validate.js"></script>
    <script src="{{asset('admin')}}/plugins/dropify/js/dropify.min.js"></script>

    <script src="{{asset('admin')}}/bundles/mainscripts.bundle.js"></script>
    <script src="{{asset('admin')}}/js/pages/forms/form-validation.js"></script>
    <script src="{{asset('admin')}}/js/pages/forms/dropify.js"></script>
    <script src="{{asset('admin')}}/plugins/summernote/dist/summernote.js"></script>
@endsection
