<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use App\Models\Collection;
use App\Models\User;
use App\Models\UserSetting;

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
        Paginator::useBootstrapFour();
        $collections = Collection::all();

        $showCoupon = 1; // 1 yes, 0 no
        $currentUrl = url()->current();
        $domain = '.'.env('APP_DOMAIN');
        $username = Str::between($currentUrl, '://', $domain);

        $user = User::where('username', $username)->where('type', 'seller')->select('id')->first();
        if ($user) {
            $settings = UserSetting::where('user_id', $user->id)->first();
            $showCoupon = $settings->show_coupon ?? 0;
        }

        View::share('collections', $collections);
        View::share('showCoupon', $showCoupon);
    }
}
