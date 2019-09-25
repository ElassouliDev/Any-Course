<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    protected $siteTitle;
    protected $siteCopyright;
    protected $Version;
    protected $icon;
    protected $logo;

    function __construct()
    {
        $this->siteTitle = Cache::remember('websiteTitle', 60 * 60 * 24, function () {
        return Setting::where('key','site_title')->first()->value ?? 'any course';
        });
        $this->siteCopyright = Cache::remember('websiteCopyright', 60 * 60 * 24, function () {
        return Setting::where('key','copyright')->first()->value ?? 'Copyright © 2014-2016';
        });
        $this->icon = Cache::remember('icon', 60 * 60 * 24, function () {
        return (Setting::where('key','icon')->first()->value) != 'image/icon.png' ? 'image/icon.png' :  'storage'.(Setting::where('key','icon')->first()->value) ?? 'image/icon.png'  ;
        });
        $this->logo = Cache::remember('logo', 60 * 60 * 24, function () {
            return (Setting::where('key','logo')->first()->value) == 'image/logo.png' ? 'image/logo.png' :  'storage'.(Setting::where('key','icon')->first()->value) ?? 'image/logo.png'  ;
        });
        View::share('site_title',$this->siteTitle);
        View::share('site_copyright',$this->siteCopyright);
        View::share('site_version',$this->Version);
        View::share('icon',$this->icon);
        View::share('logo',$this->logo);
    }
}
