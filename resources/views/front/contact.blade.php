@extends('front.layouts.app')

@section('title') Contact US @endsection

@section('style')
<style>
    [type=email], [type=number], [type=tel], [type=url] {
        direction: unset;
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
                        <h3>{{ translate('website','contact_us') }}</h3>
                        <ul>
                            <li><a href="{{route('home')}}">{{ translate('website','home') }}</a></li>
                            <li>{{ translate('website','contact_us') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--contact area start-->
    <div class="contact_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message content">
                        <h3>{{ translate('website','contact_us') }}</h3>
                        <p>{!! isset($website_setting) && $website_setting!=null ? getDefaultValueKey($website_setting->description) : '' !!}</p>
                        <ul>
                            @if(isset($website_setting) && $website_setting!=null && $website_setting->address!=null)
                                <li>
                                    <i class="fa fa-fax"></i>{{ translate('website','address') }} {{getDefaultValueKey($website_setting->address)}}
                                </li>
                            @endif
                            <li><i class="fa fa-envelope-o"></i>
                                <a href="mailto:{{$website_setting->support_email}}">{{$website_setting->support_email}}</a>
                            </li>
                            <li><i class="fa fa-phone"></i>
                                <a href="tel:{{$website_setting->support_phone}}">{{$website_setting->support_phone}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message form">
                        <h3>{{ translate('website','tell_us_your_needs') }}</h3>
                        <form id="contact-form" method="POST"
                              action="https://demo.hasthemes.com/lukani-preview-v1/lukani/assets/mail.php">
                            <p>
                                <label>{{ translate('website','name_required') }}</label>
                                <input name="name" placeholder="{{ translate('website','name') }} *" type="text">
                            </p>
                            <p>
                                <label>{{ translate('website','email_required') }}</label>
                                <input name="email" placeholder="{{ translate('website','email') }} *" type="email">
                            </p>
                            <p>
                                <label>{{ translate('website','subject') }}</label>
                                <input name="subject" placeholder="{{ translate('website','subject') }} *" type="text">
                            </p>
                            <div class="contact_textarea">
                                <label>{{ translate('website','message_required') }}</label>
                                <textarea placeholder="{{ translate('website','message') }} *" name="message" class="form-control2"></textarea>
                            </div>
                            <button type="submit">{{ translate('website','send') }}</button>
                            <p class="form-messege"></p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--contact area end-->

    <!--contact map start-->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23481.840705729177!2d30.924476288130137!3d28.969690040751555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145a333f29bf90b5%3A0x3542b5427dc074c!2z2LXZgdi3INix2KfYtNmK2YbYjCDYqNio2KfYjCDZhdit2KfZgdi42Kkg2KjZhtmKINiz2YjZitmB!5e0!3m2!1sar!2seg!4v1610465738857!5m2!1sar!2seg"
            width="100%" height="460" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
            tabindex="0"></iframe>
    <!--contact map end-->
@endsection

@section('script') @endsection
