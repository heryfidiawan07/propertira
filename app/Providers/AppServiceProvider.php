<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Page;
use App\Promo;
use App\Area;
use App\Blog;
use App\Share;
use App\Setting;
use App\Category;
use App\Property;
use App\SocialMedia;
use Illuminate\Support\Facades\View;

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
        if (! $this->app->runningInConsole()) {
            // App is not running in CLI context
            $pages  = Page::where('status','publish')->get();
            $promos = Promo::all();
            $areas  = Area::all();
            $setting = Setting::first();
            $share   = Share::whereNotNull('url')->get();
            $social  = SocialMedia::whereNotNull('url')->get();
            $categories  = Category::all();
            $new_prop    = Property::where('status','publish')->latest()->take(4)->get();
            $slide_prop  = Property::where('status','publish')->has('promos')->latest()->take(5)->get();
            $event_prop  = Property::where('status','publish')->where('event','>=',date('Y-m-d H:i:s'))->latest()->take(5)->get();
            $sticky_prop = Property::where('status','publish')->where('sticky', 1)->latest()->take(3)->get();
            $blogs       = Blog::where('status','publish')->where('sticky', 0)->latest()->take(3)->get();
            $sticky_blog = Blog::where('status','publish')->where('sticky', 1)->latest()->take(2)->get();
            View::share([
                'share'  => $share,
                'pages'  => $pages,
                'promos' => $promos,
                'areas'  => $areas,
                'setting' => $setting,
                'social'  => $social,
                'categories'  => $categories,
                'new_prop'    => $new_prop,
                'slide_prop'  => $slide_prop,
                'event_prop'  => $event_prop,
                'sticky_prop' => $sticky_prop,
                'blogs'       => $blogs,
                'sticky_blog' => $sticky_blog,
            ]);
        }
    }
}
