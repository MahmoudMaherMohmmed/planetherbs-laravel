@extends('front.layouts.app')

@section('title') Our {{isset($category)&&$category!=null ? getLangValue($category->title, 'en') : ''}} Products @endsection

@section('style')
    <style>
        .page-item.active .page-link {
            color: #fff;
            background-color: #79a206;
            border-color: #79a206;
        }

        .page-link {
            color: #000;
        }

        .page-link:hover {
            color: #e9ecef;
            background-color: #79a206;
            border-color: #79a206;
        }

        .shop_fullwidth .shop_wrapper.grid_4 .product_thumb img {
            height: 185px;
        }

        .shop_fullwidth .shop_wrapper.grid_3 .product_thumb img {
            height: 250px;
        }
    </style>
@endsection

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        @if(App::isLocale('ar'))
                            <h3>{{ translate('website','products') }} {{isset($category)&&$category!=null ? getDefaultValueKey($category->title) : ''}}</h3>
                        @else
                            <h3>{{isset($category)&&$category!=null ? getDefaultValueKey($category->title) : ''}} {{ translate('website','products') }}</h3>
                        @endif
                        <ul>
                            <li><a href="{{route('home')}}">{{ translate('website','home') }}</a></li>
                            @if(App::isLocale('ar'))
                                <li>{{ translate('website','products') }} {{isset($category)&&$category!=null ? getDefaultValueKey($category->title) : ''}}</li>
                            @else
                                <li>{{isset($category)&&$category!=null ? getDefaultValueKey($category->title) : ''}} {{ translate('website','products') }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <div class="shop_area shop_fullwidth mt-100 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class=" btn-grid-3" data-toggle="tooltip"
                                    title="3"></button>

                            <button data-role="grid_4" type="button" class="active btn-grid-4" data-toggle="tooltip"
                                    title="4"></button>

                            <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip"
                                    title="List"></button>
                        </div>
                        <div class="page_amount">
                            <p>
                                {{ translate('website','showing') }} {{ $products->firstItem() }}
                                –{{ $products->lastItem() }}
                                {{ translate('website','of') }} {{ $products->total() }} {{ translate('website','results') }}
                            </p>
                        </div>
                    </div>
                    @if(isset($products) && $products!=null)
                        <div class="row shop_wrapper grid_4">
                            @foreach($products as $product)
                                <div class="col-lg-3 col-md-4 col-12 ">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="javascript:void(0);">
                                                    <img src="{{asset('files/'.$product->image)}}"
                                                         alt="{{getDefaultValueKey($product->title)}}">
                                                </a>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="quick_button">
                                                            <a href="#" data-toggle="modal"
                                                               data-target="#modal_box"
                                                               title="quick view"
                                                               onclick="modalData('{{$product->id}}', '{{$product->code}}', '{{getDefaultValueKey($product->title)}}', '{{getShortDescription($product->description)}}', '{{asset("files/".$product->image)}}', '{{route('product',[$product->slug])}}')">
                                                                <i class="icon-eye"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="action_links list_action">
                                                    <ul>
                                                        <li class="quick_button">
                                                            <a href="#" data-toggle="modal"
                                                               data-target="#modal_box"
                                                               title="quick view"
                                                               onclick="modalData('{{$product->id}}', '{{$product->code}}', '{{getDefaultValueKey($product->title)}}', '{{getShortDescription($product->description)}}', '{{asset("files/".$product->image)}}', '{{route('product',[$product->slug])}}')">
                                                                <i class="icon-eye"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product_content grid_content">
                                                <div class="product_price_rating">
                                                    <div class="product_rating">
                                                        <ul>
                                                            <li><a href="javascript:void(0);"><i class="icon-star"></i></a>
                                                            </li>
                                                            <li><a href="javascript:void(0);"><i class="icon-star"></i></a>
                                                            </li>
                                                            <li><a href="javascript:void(0);"><i class="icon-star"></i></a>
                                                            </li>
                                                            <li><a href="javascript:void(0);"><i class="icon-star"></i></a>
                                                            </li>
                                                            <li><a href="javascript:void(0);"><i class="icon-star"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <h4 class="product_name">
                                                        <a href="{{route('product',[$product->slug])}}">{{getDefaultValueKey($product->title)}}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="product_content list_content">
                                                <div class="product_rating">
                                                    <ul>
                                                        <li><a href="javascript:void(0);"><i class="icon-star"></i></a>
                                                        </li>
                                                        <li><a href="javascript:void(0);"><i class="icon-star"></i></a>
                                                        </li>
                                                        <li><a href="javascript:void(0);"><i class="icon-star"></i></a>
                                                        </li>
                                                        <li><a href="javascript:void(0);"><i class="icon-star"></i></a>
                                                        </li>
                                                        <li><a href="javascript:void(0);"><i class="icon-star"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h4 class="product_name"><a
                                                            href="{{route('product',[$product->slug])}}">{{getDefaultValueKey($product->title)}}</a>
                                                </h4>
                                                <div class="product_desc">
                                                    <p>{!! getShortDescription($product->description) !!}</p>
                                                </div>
                                            </div>
                                        </figure>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if ($products->hasPages())
                        <div class="shop_toolbar t_bottom">
                            <div class="pagination">
                                {{ $products->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script') @endsection
