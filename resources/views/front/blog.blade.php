@extends('front.layouts.app')

@section('title') Blog @endsection

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
    </style>
@endsection

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>{{ translate('website','blog') }}</h3>
                        <ul>
                            <li><a href="{{route('home')}}">{{ translate('website','home') }}</a></li>
                            <li>{{ translate('website','blog') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--blog area start-->
    <div class="blog_page_section blog_fullwidth mt-100">
        <div class="container">
            <div class="row">
                @if(isset($news) && $news!=null)
                    <div class="col-lg-9 col-md-12">
                        <div class="blog_wrapper">
                            @foreach($news as $new)
                                <article class="single_blog">
                                    <figure>
                                        <div class="blog_thumb">
                                            <a href="{{route('blog_details',[$new->slug])}}">
                                                <img src="{{asset('files/'.$new->image)}}"
                                                     alt="{{getDefaultValueKey($new->title)}}" style="width: 100%">
                                            </a>
                                        </div>
                                        <figcaption class="blog_content">
                                            <h4 class="post_title">
                                                <a href="{{route('blog_details',[$new->slug])}}"><i
                                                            class="fa fa-paper-plane"></i>
                                                    {{getDefaultValueKey($new->title)}}
                                                </a>
                                            </h4>
                                            <div class="blog_meta">
                                                <p>By <a href="javascript:void(0);">admin</a> / Date <a
                                                            href="javascript:void(0);">{{$new->created_at->format('M d, Y')}}</a>
                                                </p>
                                            </div>
                                            <p class="post_desc">
                                                {{ \Illuminate\Support\Str::words( strip_tags(getDefaultValueKey($new->description)), $words = 50, $end = '...') }}
                                            </p>
                                            <footer class="btn_more">
                                                <a href="{{route('blog_details',[$new->slug])}}">{{ translate('website','read_more') }}</a>
                                            </footer>
                                        </figcaption>
                                    </figure>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @endif
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
    <!--blog area end-->

    <!--blog pagination area start-->
    <div class="blog_pagination">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {{ $news->links() }}
                </div>
            </div>
        </div>
    </div>
    <!--blog pagination area end-->
@endsection

@section('script') @endsection
