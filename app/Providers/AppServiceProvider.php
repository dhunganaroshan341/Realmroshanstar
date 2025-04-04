<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\frontend;
use App\Models\Service;
use App\Models\WorkingDay;
use Illuminate\Pagination\Paginator;
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['User.layout.header', 'frontend.layout.main','frontend.layout.footer', 'User.layout.main', 'User.layout.footer', 'User.contact', 'User.about'], function ($view) {
            $setting = Setting::first();
            $services=Service::where('status','1')->get();

            $view->with([
                'email' => $setting->email ?? '',
                'title' => $setting->title ?? '',
                'address' => $setting->address ?? '',
                'contact' => $setting->contact ?? '',
                'description' => $setting->description ?? '',
                'logo' => $setting->logo ?? '',
                'work_description' => $setting->work_description ?? '',
                'facebook' => $setting->facebook_url ?? '',
                'twitter' => $setting->twitter_url ?? '',
                'instagram' => $setting->instagram_url ?? '',
                'github' => $setting->github_url ?? '',
                'workdesc'=>WorkingDay::all(),
                'services'=>$services

            ]);
        });

        // View::composer('*',  function ($view) {
        //     $routeName = Route::currentRouteName();
        //     $scripts = config('js-map.' . $routeName, []);

        //     $view->with('scripts', $scripts);
        // });

        Paginator::useBootstrapFive();
    }
}
