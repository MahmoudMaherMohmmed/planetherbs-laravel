@extends('front.layouts.app')

@section('title') Home @endsection

@section('style')
    <style>
        .owl-carousel .owl-item img {
            height: 160px;
        }
    </style>
@endsection

@section('content')
    @if(isset($sliders) && $sliders!=null)
        <section class="slider_section slider_s_two">
            <div class="slider_area owl-carousel">
                @foreach($sliders as $slider)
                    <div class="single_slider d-flex align-items-center"
                         data-bgimg="{{asset('files/'.$slider->image)}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="slider_content">
                                        <span>{{ translate('website','amazing_from_planetherbs') }}</span>
                                        <h1>{{getDefaultValueKey($slider->title)}}</h1>
                                        <p>{{getDefaultValueKey($slider->subtitle)}} </p>
                                        <a class="button"
                                           href="{{route('products')}}">{{ translate('website','discover_now') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <div class="welcome_lukani_store">
        <div class="container">
            <div class="welcome_lukani_container">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="welcome_lukani_thumb">
                            <img src="{{asset('front')}}/img/bg/img-top-vogue3.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="welcome_lukani_content">
                            <div class="welcome_lukani_header">
                                <h3>{{ translate('website','welcome_to_planet_herbs') }}</h3>
                                <h2>{{ translate('website','planet_herbs_history') }}</h2>
                            </div>
                            <div class="welcome_lukani_desc">
                                <p>{!! isset($website_setting) && $website_setting!=null ? getDefaultValueKey($website_setting->description) : '' !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(isset($services) && $services!=null)
        <div class="choseus_area" data-bgimg="{{asset('front')}}/img/about/about-us-policy-bg.jpg">
            <div class="container">
                <div class="row">
                    @foreach($services as $service)
                        <div class="col-lg-4 col-md-4">
                            <div class="single_chose">
                                <div class="chose_icone">
                                    <img src="{{asset('files/'.$service->image)}}"
                                         alt="{{getDefaultValueKey($service->title)}}">
                                </div>
                                <div class="chose_content">
                                    <h3>{{getDefaultValueKey($service->title)}}</h3>
                                    <p>{{getDefaultValueKey($service->description)}}</p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if(isset($products) && $products!=null)
        <div class="product_area product_style2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2>{{ translate('website','featured_products') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="product_style2_ocntainer">
                    <div class="row">
                        <div class="product_carousel product2_column5 owl-carousel">
                            @foreach($products->chunk(2) as $product_set)
                                <div class="col-lg-3">
                                    <div class="product_items">
                                        @foreach($product_set as $product)
                                            <article class="single_product">
                                                <figure>
                                                    <div class="product_thumb">
                                                        <a class="primary_img" href="javascript:void(0);"><img
                                                                    src="{{asset('files/'.$product->image)}}"
                                                                    alt="{{getDefaultValueKey($product->title)}}">
                                                        </a>
                                                        <div class="action_links">
                                                            <ul>
                                                                <li class="quick_button">
                                                                    <a href="#" data-toggle="modal"
                                                                       data-target="#modal_box"
                                                                       title="quick view"
                                                                       onclick="modalData('{{$product->id}}', '{{$product->code}}', '{{getDefaultValueKey($product->title)}}', '{{getShortDescription($product->description)}}', '{{asset("files/".$product->image)}}', '{{route('product',[$product->slug])}}')">
                                                                        <i class="icon-eye"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <figcaption class="product_content">
                                                        <div class="product_rating">
                                                            <ul>
                                                                <li>
                                                                    <a href="javascript:void(0);"><i
                                                                                class="icon-star"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);"><i
                                                                                class="icon-star"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);"><i
                                                                                class="icon-star"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);"><i
                                                                                class="icon-star"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);"><i
                                                                                class="icon-star"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <h4 class="product_name">
                                                            <a href="{{route('product',[$product->slug])}}">
                                                                {{getDefaultValueKey($product->title)}}
                                                            </a>
                                                        </h4>
                                                    </figcaption>
                                                </figure>
                                            </article>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(isset($news) && $news!=null)
        <section class="blog_section blog_s_three">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2>{{ translate('website','our_latest_posts') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="blog_carousel blog_column3 owl-carousel">
                        @foreach($news as $new)
                            <div class="col-lg-3">
                                <article class="single_blog">
                                    <figure>
                                        <div class="blog_thumb">
                                            <a href="{{route('blog_details',[$new->slug])}}">
                                                <img src="{{asset('files/'.$new->image)}}"
                                                     alt="{{getDefaultValueKey($new->title)}}"
                                                     style="height: 250px;">
                                            </a>
                                        </div>
                                        <figcaption class="blog_content">
                                            <h4 class="post_title"><a
                                                        href="{{route('blog_details',[$new->slug])}}">{{getDefaultValueKey($new->title)}}</a>
                                            </h4>
                                            <div class="articles_date">
                                                <p>By <span>admin / {{$new->created_at->format('M d, Y')}}</span></p>
                                            </div>
                                            <p class="post_desc">
                                                {{ \Illuminate\Support\Str::words( strip_tags(getDefaultValueKey($new->description)), $words = 20, $end = '...') }}
                                            </p>
                                            <footer class="blog_footer">
                                                <a href="{{route('blog_details',[$new->slug])}}">{{ translate('website','continue_reading') }}</a>
                                            </footer>
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
