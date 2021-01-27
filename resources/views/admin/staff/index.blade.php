@extends('admin.layouts.app')

@section('title') Staff @endsection

@section('styles')
    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="{{asset('admin')}}/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Staff</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Users Settings</a></li>
                        <li class="breadcrumb-item active">Staff</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                    <a href="{{ route('staff.create') }}" class="btn btn-success btn-icon float-right"><i
                            class="zmdi zmdi-plus"></i></a>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                @if(session()->has('msg'))
                                    <div class="alert alert-success">
                                        {{ session()->get('msg') }}
                                    </div>
                                @endif
                                <table
                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Control</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Control</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @if(isset($items) && $items!=null)
                                        @foreach($items as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->phone}}</td>
                                                <td>{{$item->status==1 ? 'ON' : 'OFF'}}</td>
                                                <td>
                                                    <a href="{{ route('staff.edit' , $item->id )}}">
                                                        <button class="btn btn-success"><i
                                                                class="zmdi zmdi-edit"></i></button>
                                                    </a>

                                                    <form action="{{ route('staff.destroy' , $item->id )}}"
                                                          method="POST"
                                                          style="display: initial;">

                                                        @csrf

                                                        <input type="hidden" name="_method" value="DELETE"/>

                                                        <button class="btn btn-danger"><i

                                                                class="zmdi zmdi-delete"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('admin')}}/bundles/datatablescripts.bundle.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>

    <script src="{{asset('admin')}}/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="{{asset('admin')}}/js/pages/tables/jquery-datatable.js"></script>
@endsection
