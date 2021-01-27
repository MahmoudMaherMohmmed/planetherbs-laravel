<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\WebsiteSetting;
use App\Category;
use App\SocialLink;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('website_setting', WebsiteSetting::first());
        view()->share('categories', Category::where('status', 1)->get());
        view()->share('sociallinks', SocialLink::where('status', 1)->get());
    }
}
