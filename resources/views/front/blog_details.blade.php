@extends('front.layouts.app')

@section('title') Blog Details @endsection

@section('style')
    <style>
        .post_content ul {
            list-style: outside !important;
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
                        <h3>{{ translate('website','blog_details') }}</h3>
                        <ul>
                            <li><a href="{{route('home')}}">{{ translate('website','home') }}</a></li>
                            <li>{{ translate('website','blog_details') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--blog body area start-->
    <div class="blog_details">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <!--blog grid area start-->
                    <div class="blog_wrapper blog_wrapper_details">
                        <article class="single_blog">
                            <figure>
                                <div class="post_header">
                                    <h3 class="post_title">{{getDefaultValueKey($new->title)}}</h3>
                                    <div class="blog_meta">
                                        <p>Posted by : <a href="javascript:void(0);">admin</a> / On : <a
                                                    href="javascript:void(0);">{{$new->created_at->format('M d, Y')}}</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="blog_thumb">
                                    <a href="javascript:void(0);">
                                        <img src="{{asset('files/'.$new->image)}}"
                                             alt="{{getDefaultValueKey($new->title)}}"
                                             style="width: 100%;">
                                    </a>
                                </div>
                                <figcaption class="blog_content">
                                    <div class="post_content">
                                        <p>{!! getDefaultValueKey($new->description) !!}</p>
                                    </div>
                                    <div class="entry_content">
                                        <div class="social_sharing">
                                            <p>{{ translate('website','share_this_post') }}</p>
                                            <ul>
                                                <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a>
                                                </li>
                                                <li><a href="#" title="google+"><i class="fa fa-google-plus"></i></a>
                                                </li>
                                                <li><a href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <!--blog grid area start-->
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="blog_sidebar_widget">
                        @if(isset($recent_news) && $recent_news)
                            <div class="widget_list widget_post">
                                <div class="widget_title">
                                    <h3>{{ translate('website','recent_posts') }}</h3>
                                </div>
                                @foreach($recent_news as $recent)
                                    <div class="post_wrapper">
                                        <div class="post_thumb">
                                            <a href="{{route('blog_details',[$recent->slug])}}">
                                                <img src="{{asset('files/'.$recent->image)}}"
                                                     alt="{{getDefaultValueKey($recent->title)}}">
                                            </a>
                                        </div>
                                        <div class="post_info">
                                            <h4>
                                                <a href="{{route('blog_details',[$recent->slug])}}">
                                                    {{getDefaultValueKey($recent->title)}}
                                                </a>
                                            </h4>
                                            <span>{{$recent->created_at->format('M d, Y')}}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        @if(isset($categories) && $categories)
                            <div class="widget_list widget_categories">
                                <div class="widget_title">
                                    <h3>{{ translate('website','product_categories') }}</h3>
                                </div>
                                <ul>
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="{{route('products', [$category->id])}}">{{getDefaultValueKey($category->title)}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(isset($products) && $products!=null)
                            <div class="widget_list widget_tag">
                                <div class="widget_title">
                                    <h3>{{ translate('website','top_products') }}</h3>
                                </div>
                                <div class="tag_widget">
                                    <ul>
                                        @foreach($products as $product)
                                            <li>
                                                <a href="{{route('product',[$product->slug])}}">{{getDefaultValueKey($product->title)}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--blog section area end-->
@endsection

@section('script') @endsection
