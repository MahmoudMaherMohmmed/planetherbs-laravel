@extends('front.layouts.app')

@section('title') {{isset($product)&&$product!=null ? getLangValue($product->title, 'en') : ''}} @endsection

@section('style')
    <style>
        .product_d_right .price_box span.current_price {
            font-size: 16px;
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
                        <h3> {{isset($product)&&$product!=null ? getDefaultValueKey($product->title) : ''}}</h3>
                        <ul>
                            <li><a href="{{route('home')}}">{{ translate('website','home') }}</a></li>
                            <li> {{isset($product)&&$product!=null ? getDefaultValueKey($product->title) : ''}} </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--product details start-->
    <div class="product_details mt-100 mb-100">
        <div class="container">
            <div class="row">
                @if(isset($product) && $product!=null)
                    <div class="col-lg-6 col-md-6">
                        <div class="product-details-tab">
                            <div id="img-1" class="zoomWrapper single-zoom">
                                <a href="javascript:void(0);">
                                    <img id="zoom1" src="{{asset('files/'.$product->image)}}"
                                         data-zoom-image="{{asset('files/'.$product->image)}}"
                                         alt="{{getDefaultValueKey($product->title)}}"
                                         style="min-height: 500px; width: 100%;">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product_d_right">
                            <form action="javascript:void(0);">

                                <h1><a href="javascript:void(0);">{{getDefaultValueKey($product->title)}}</a></h1>
                                <div class=" product_ratting">
                                    <ul>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="price_box">
                                    <b>{{ translate('website','product_code') }}</b> <span class="current_price">{{$product->code}}</span>
                                </div>
                                <div class="product_desc">
                                    <p>{!! getDefaultValueKey($product->description)!!}</p>
                                </div>
                            </form>
                            <div class="priduct_social">
                                <ul>
                                    <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i>
                                            Like</a></li>
                                    <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a>
                                    </li>
                                    <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i>
                                            save</a>
                                    </li>
                                    <li><a class="google-plus" href="#" title="google +"><i
                                                    class="fa fa-google-plus"></i>
                                            share</a></li>
                                    <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i>
                                            linked</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!--product details end-->

    <!--product info start-->
    <div class="product_d_info mb-90">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="reviews_wrapper">
                            <div class="product_review_form">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="review_comment">{{ translate('website','message') }}</label>
                                            <textarea name="comment" id="review_comment"></textarea>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <label for="author">{{ translate('website','name') }}</label>
                                            <input id="author" type="text">

                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <label for="email">{{ translate('website','email') }}</label>
                                            <input id="email" type="text">
                                        </div>
                                    </div>
                                    <button type="submit">{{ translate('website','send') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product info end-->

    @if(isset($related_products) && $related_products!=null)
        <section class="product_area related_products">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2>{{ translate('website','related_products') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product_carousel product_column4 owl-carousel">
                        @foreach($related_products as $related_product)
                            <div class="col-lg-3">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="{{route('product',[$related_product->slug])}}">
                                                <img src="{{asset('files/'.$related_product->image)}}"
                                                     alt="{{getDefaultValueKey($related_product->title)}}"
                                                     style="height: 185px;">
                                            </a>
                                            <div class="action_links">
                                                <ul>
                                                    <li class="quick_button">
                                                        <a href="#" data-toggle="modal"
                                                           data-target="#modal_box"
                                                           title="quick view"
                                                           onclick="modalData('{{$related_product->id}}', '{{$related_product->code}}', '{{getDefaultValueKey($related_product->title)}}', '{{getDefaultValueKey($related_product->description)}}', '{{asset("files/".$related_product->image)}}', '{{route('product',[$product->slug])}}')">
                                                            <i class="icon-eye"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4 class="product_name">
                                                <a href="{{route('product',[$related_product->slug])}}">
                                                    {{getDefaultValueKey($related_product->title)}}
                                                </a>
                                            </h4>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection

@section('script') @endsection
