@extends('front.layouts.app')

@section('title') Certifications @endsection

@section('style')
    <link href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css" rel="stylesheet">
    <style>
        .demo-gallery > ul {
            margin-bottom: 0;
        }

        .demo-gallery > ul > li {
            margin-bottom: 50px;
        }

        .demo-gallery > ul > li a {
            border: 3px solid #FFF;
            border-radius: 3px;
            display: block;
            overflow: hidden;
            position: relative;
            float: left;
        }

        .demo-gallery > ul > li a > img {
            -webkit-transition: -webkit-transform 0.15s ease 0s;
            -moz-transition: -moz-transform 0.15s ease 0s;
            -o-transition: -o-transform 0.15s ease 0s;
            transition: transform 0.15s ease 0s;
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
            height: 100%;
            width: 100%;
        }

        .demo-gallery > ul > li a:hover > img {
            -webkit-transform: scale3d(1.1, 1.1, 1.1);
            transform: scale3d(1.1, 1.1, 1.1);
        }

        .demo-gallery > ul > li a:hover .demo-gallery-poster > img {
            opacity: 1;
        }

        .demo-gallery > ul > li a .demo-gallery-poster {
            background-color: rgba(0, 0, 0, 0.1);
            bottom: 0;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            -webkit-transition: background-color 0.15s ease 0s;
            -o-transition: background-color 0.15s ease 0s;
            transition: background-color 0.15s ease 0s;
        }

        .demo-gallery > ul > li a .demo-gallery-poster > img {
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            opacity: 0;
            position: absolute;
            top: 50%;
            -webkit-transition: opacity 0.3s ease 0s;
            -o-transition: opacity 0.3s ease 0s;
            transition: opacity 0.3s ease 0s;
        }

        .demo-gallery > ul > li a:hover .demo-gallery-poster {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .demo-gallery .justified-gallery > a > img {
            -webkit-transition: -webkit-transform 0.15s ease 0s;
            -moz-transition: -moz-transform 0.15s ease 0s;
            -o-transition: -o-transform 0.15s ease 0s;
            transition: transform 0.15s ease 0s;
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
            height: 100%;
            width: 100%;
        }

        .demo-gallery .justified-gallery > a:hover > img {
            -webkit-transform: scale3d(1.1, 1.1, 1.1);
            transform: scale3d(1.1, 1.1, 1.1);
        }

        .demo-gallery .justified-gallery > a:hover .demo-gallery-poster > img {
            opacity: 1;
        }

        .demo-gallery .justified-gallery > a .demo-gallery-poster {
            background-color: rgba(0, 0, 0, 0.1);
            bottom: 0;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            -webkit-transition: background-color 0.15s ease 0s;
            -o-transition: background-color 0.15s ease 0s;
            transition: background-color 0.15s ease 0s;
        }

        .demo-gallery .justified-gallery > a .demo-gallery-poster > img {
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            opacity: 0;
            position: absolute;
            top: 50%;
            -webkit-transition: opacity 0.3s ease 0s;
            -o-transition: opacity 0.3s ease 0s;
            transition: opacity 0.3s ease 0s;
        }

        .demo-gallery .justified-gallery > a:hover .demo-gallery-poster {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .demo-gallery .video .demo-gallery-poster img {
            height: 48px;
            margin-left: -24px;
            margin-top: -24px;
            opacity: 0.8;
            width: 48px;
        }

        .demo-gallery.dark > ul > li a {
            border: 3px solid #04070a;
        }

        .heading {
            text-align: center;
            padding: 25px 0px 50px;
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
                        <h3>{{ translate('website','certifications') }}</h3>
                        <ul>
                            <li><a href="{{route('home')}}">{{ translate('website','home') }}</a></li>
                            <li>{{ translate('website','certifications') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <div class="container" style="margin-top: 100px;">
        @if(isset($certifications) && $certifications!=null && count($certifications)>0)
            <div class="demo-gallery">
                <ul id="lightgallery" class="list-unstyled row">
                    @foreach($certifications as $certificate)
                        <li class="col-lg-3 col-md-3 col-xs-6 col-sm-6"
                            data-responsive="{{url('files/',$certificate->image)}}"
                            data-src="{{url('files/',$certificate->image)}}"
                            data-sub-html="<h4>{{getDefaultValueKey($certificate->title)}}</h4>"
                            data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1">
                            <a href="">
                                <img class="img-responsive"
                                     src="{{url('files/',$certificate->image)}}"
                                     alt="{{getDefaultValueKey($certificate->title)}}">
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection

@section('script')
    <script src="{{asset('front')}}/js/gallery/lightgallery.js"></script>
    <script src="{{asset('front')}}/js/gallery/lg-zoom.js"></script>
    <script src="{{asset('front')}}/js/gallery/lg-thumbnail.js"></script>
    <script src="{{asset('front')}}/js/gallery/lg-share.js"></script>
    <script src="{{asset('front')}}/js/gallery/lg-pager.js"></script>
    <script src="{{asset('front')}}/js/gallery/lg-hash.js"></script>
    <script src="{{asset('front')}}/js/gallery/lg-fullscreen.js"></script>
    <script src="{{asset('front')}}/js/gallery/lg-autoplay.js"></script>
    <script>
        lightGallery(document.getElementById('lightgallery'));
    </script>
@endsection
