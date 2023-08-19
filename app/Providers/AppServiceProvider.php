<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Config;
use Cache;
use App\Models\Settings;
use App\Models\Company;
use Exception;
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
        $settings = Cache::rememberForever('settings', function() {
            try {
                return Settings::find(1) ?? new Settings;
            } catch (Exception $e) {
                return new Settings;
            }
        });
        
        $company = Cache::rememberForever('company', function() {
            try {
                return Company::find(1) ?? new Company;
            } catch (Exception $e) {
                return new Company;
            }
        });

        View::share('settings', $settings);
        View::share('company', $company);
        if($settings->title) {
            Config::set('mail.from.name', $settings->title);
            Config::set('app.name', $settings->title);
        }
    }
}
