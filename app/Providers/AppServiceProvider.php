<?php

namespace App\Providers;

use App\Course;
use App\Observers\CourseObserver;
use App\Observers\SettingObserver;
use App\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::enableForeignKeyConstraints();
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Course::observe(CourseObserver::class);
        Setting::observe(SettingObserver::class);

    }
}
