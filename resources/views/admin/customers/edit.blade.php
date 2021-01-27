@extends('admin.layouts.app')

@section('title') Customers @endsection

@section('styles')
    <link
        href="{{asset('admin')}}/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
        rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('admin')}}/plugins/dropify/css/dropify.min.css">
@endsection

@section('content')
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Customers</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Users Settings</a></li>
                        <li class="breadcrumb-item active">{{isset($item) ? 'Edit Customer' : 'New Customer'}}</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                    <a href="{{route('customers.index')}}" class="btn btn-warning btn-icon float-right"><i
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
                                  action="{{ isset($item) ? route('customers.update',$item->id) : route('customers.store') }}"
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
                                        <label>First Name</label>
                                        <div class="form-group form-float">
                                            <input type="text" class="form-control" name="first_name"
                                                   value="{{ isset($item) ? $item->first_name : old('first_name') }}"
                                                   placeholder="First Name"
                                                   minlength="3" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Last Name</label>
                                        <div class="form-group form-float">
                                            <input type="text" class="form-control" name="last_name"
                                                   value="{{ isset($item) ? $item->last_name : old('last_name') }}"
                                                   placeholder="Last Name"
                                                   minlength="3" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>User Name</label>
                                        <div class="form-group form-float">
                                            <input type="text" class="form-control" name="name"
                                                   value="{{ isset($item) ? $item->name : old('name') }}"
                                                   placeholder="User Name"
                                                   minlength="3" required
                                                {{ isset($item) ? 'disabled' : '' }}>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Email</label>
                                        <div class="form-group form-float">
                                            <input type="email" class="form-control" name="email"
                                                   value="{{ isset($item) ? $item->email : old('email') }}"
                                                   placeholder="Email"
                                                   minlength="3" required
                                                {{ isset($item) ? 'disabled' : '' }}>
                                        </div>
                                    </div>
                                </div>

                                @if(!isset($item))
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label>Password</label>
                                            <div class="form-group form-float">
                                                <input type="password" class="form-control" name="password"
                                                       placeholder="Password"
                                                       minlength="8" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label>Confirm Password</label>
                                            <div class="form-group form-float">
                                                <input type="password" class="form-control" name="password_confirmation"
                                                       placeholder="Confirm Password"
                                                       minlength="8" required>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Phone</label>
                                        <div class="form-group form-float">
                                            <input type="text" class="form-control" name="phone"
                                                   value="{{ isset($item) ? $item->phone : old('phone') }}"
                                                   placeholder="Phone" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Mobile</label>
                                        <div class="form-group form-float">
                                            <input type="text" class="form-control" name="mobile"
                                                   value="{{ isset($item) ? $item->mobile : old('mobile') }}"
                                                   placeholder="Mobile">
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Birthdate</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="zmdi zmdi-calendar"></i></span></div>
                                            <input type="text" id="date-time" class="form-control"
                                                   name="birthdate" placeholder="Birthdate"
                                                   value="{{ isset($item) ? $item->birthdate : old('birthdate') }}"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Gender</label>
                                        <div class="form-group form-float">
                                            <select name="gender" class="form-control show-tick ms select2"
                                                    data-placeholder="Select">
                                                <option
                                                    value="-1" {{ isset($item) && $item->gernder == 1 ? "disabled" : "" }}>
                                                    -- Choose Gender --
                                                </option>
                                                <option
                                                    value="1" {{ isset($item) && $item->gender == 1 ? "Selected" : "" }}>
                                                    Male
                                                </option>
                                                <option
                                                    value="0" {{ isset($item) && $item->gender == 0 ? "Selected" : "" }}>
                                                    Female
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Country</label>
                                        <div class="form-group form-float">
                                            <select name="country_id" id="country" class="form-control show-tick ms"
                                                    data-placeholder="Select">
                                                <option
                                                    value="-1" {{ isset($item) && $item->status == 1 ? "disabled" : "" }}>
                                                    -- Choose Country --
                                                </option>
                                                @php $countries = \App\Country::all(); @endphp
                                                @if(isset($countries) && $countries!=null)
                                                    @foreach($countries as $country)
                                                        <option
                                                            value="{{$country->id}}" {{ isset($item) && $item->country_id == $country->id ? "Selected" : "" }}>
                                                            {{$country->name}}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>State</label>
                                        <div class="form-group form-float">
                                            <select name="state_id" id="states" class="form-control show-tick ms"
                                                    data-placeholder="Select">
                                                <option
                                                    value="-1" {{ isset($item) && $item->status == 1 ? "disabled" : "" }}>
                                                    -- Choose state --
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label>Address</label>
                                        <div class="form-group form-float">
                                            <textarea type="text" class="form-control" name="address"
                                                      placeholder="Address"
                                                      rows="4">{{ isset($item) ? $item->address : old('address') }}</textarea>
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
                                        <label>Group</label>
                                        <div class="form-group form-float">
                                            <select name="group" class="form-control show-tick ms select2"
                                                    data-placeholder="Select">
                                                <option
                                                    value="0" {{ isset($item) && $item->group == 0 ? "Selected" : "" }}>
                                                    Customer
                                                </option>
                                                <option
                                                    value="1" {{ isset($item) && $item->group == 1 ? "Selected" : "" }}>
                                                    Employee
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
    <script src="{{asset('admin')}}/plugins/momentjs/moment.js"></script>
    <script
        src="{{asset('admin')}}/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="{{asset('admin')}}/bundles/mainscripts.bundle.js"></script>
    <script src="{{asset('admin')}}/js/pages/forms/form-validation.js"></script>
    <script src="{{asset('admin')}}/js/pages/forms/dropify.js"></script>
    <script src="{{asset('admin')}}/js/pages/forms/advanced-form-elements.js"></script>

    <script>
        $('#country').on('change', function () {
            var country_id = $('#country').val();

            getStates(country_id);
        });

        function getStates(country_id) {
            var token = '{{Session::token()}}';

            $.ajax({
                method: 'POST',
                url: '{{route("get-states")}}',
                data: {country_id: country_id, _token: token},
                success: function (data) {
                    var data = JSON.parse(data);

                    console.log(data);

                    var html = "";
                    $.each(data['states'], function (key, val) {
                        html += '<option value="' + val['id'] + '" >' + val['name'] + '</option>'
                    });
                    $("#states").html(html);
                },
                error: function () {
                    console.log(data);
                }
            });
        }
    </script>
    <script>
        $(function () {
            $('#date-time').bootstrapMaterialDatePicker({
                time: false
            });
        });
    </script>
@endsection
