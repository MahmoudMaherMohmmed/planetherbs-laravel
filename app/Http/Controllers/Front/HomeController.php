<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Certification;
use App\Http\Controllers\Controller;
use App\Mission;
use App\News;
use App\Product;
use App\Service;
use App\Slider;
use App\Strategy;
use App\Team;
use App\Vision;


class HomeController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $sliders = Slider::where('status', 1)->get();
        $services = Service::where('status', 1)->get();
        $products = Product::where('status', 1)->where('distinguish', 1)->get();
        $news = News::where('status', 1)->limit(4)->get();
        return view('front.home', compact('sliders', 'services', 'products', 'news'));
    }

    public function about()
    {
        $services = Service::where('status', 1)->get();
        $mission = Mission::where('status', 1)->first();
        $vision = Vision::where('status', 1)->first();
        $strategy = Strategy::where('status', 1)->first();
        $members = Team::where('status', 1)->get();
        return view('front.about', compact('services', 'mission', 'vision', 'strategy', 'members'));
    }

    public function products($category_id = null)
    {
        $category = null;
        if (isset($category_id) && $category_id != null) {
            $category = Category::find($category_id);
            $products = $category->products()->paginate(12);
        } else {
            $products = Product::where('status', 1)->paginate(12);
        }
        return view('front.products', compact('category', 'products'));
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->where('status', 1)->first();
        $related_products = $product->category->products;

        return view('front.product_details', compact('product', 'related_products'));
    }

    public function blog()
    {
        $news = News::where('status', 1)->paginate(3);
        $recent_news = News::where('status', 1)->limit(5)->get();
        $products = Product::where('status', 1)->where('distinguish', 1)->get();
        return view('front.blog', compact('news', 'recent_news', 'products'));
    }

    public function blog_details($slug)
    {
        $new = News::where('slug', $slug)->where('status', 1)->first();
        $recent_news = News::where('status', 1)->limit(5)->get();
        $products = Product::where('status', 1)->where('distinguish', 1)->get();
        return view('front.blog_details', compact('new', 'recent_news', 'products'));
    }

    public function certifications()
    {
        $certifications = Certification::where('status', 1)->get();
        return view('front.certifications', compact('certifications'));
    }

    public function contact_us()
    {
        return view('front.contact');
    }
}
