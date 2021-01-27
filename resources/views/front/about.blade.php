@extends('front.layouts.app')

@section('title') About US @endsection

@section('style') @endsection

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>{{ translate('website','about') }}</h3>
                        <ul>
                            <li><a href="{{route('home')}}">{{ translate('website','home') }}</a></li>
                            <li>{{ translate('website','about') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

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

    <div class="about_gallery_section">
        <div class="container">
            <div class="about_gallery_container">
                <div class="row">
                    @if(isset($vision) && $vision!=null)
                        <div class="col-lg-4 col-md-4">
                            <article class="single_gallery_section">
                                <figure>
                                    <div class="gallery_thumb">
                                        <img src="{{asset('files/'.$vision->image)}}"
                                             alt="{{getDefaultValueKey($vision->title)}}" style="height: 235px;">
                                    </div>
                                    <figcaption class="about_gallery_content">
                                        <h3>{{getDefaultValueKey($vision->title)}}</h3>
                                        <p>{{getDefaultValueKey($vision->description)}}</p>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                    @endif
                    @if(isset($mission) && $mission!=null)
                        <div class="col-lg-4 col-md-4">
                            <article class="single_gallery_section">
                                <figure>
                                    <div class="gallery_thumb">
                                        <img src="{{asset('files/'.$mission->image)}}"
                                             alt="{{getDefaultValueKey($mission->title)}}" style="height: 235px;">
                                    </div>
                                    <figcaption class="about_gallery_content">
                                        <h3>{{getDefaultValueKey($mission->title)}}</h3>
                                        <p>{{getDefaultValueKey($mission->description)}}</p>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                    @endif
                    @if(isset($strategy)&& $strategy!=null)
                        <div class="col-lg-4 col-md-4">
                            <article class="single_gallery_section">
                                <figure>
                                    <div class="gallery_thumb">
                                        <img src="{{asset('files/'.$strategy->image)}}"
                                             alt="{{getDefaultValueKey($strategy->title)}}" style="height: 235px;">
                                    </div>
                                    <figcaption class="about_gallery_content">
                                        <h3>{{getDefaultValueKey($strategy->title)}}</h3>
                                        <p>{{getDefaultValueKey($strategy->description)}}</p>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script') @endsection
