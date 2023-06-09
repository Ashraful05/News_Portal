<?php

namespace App\Providers;

use App\Models\SidebarAdvertisement;
use App\Models\TopAdvertisement;
use Illuminate\Pagination\Paginator;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $topAddData = TopAdvertisement::where('id',1)->first();
        $sidebarTopAd = SidebarAdvertisement::where('sidebar_ad_location','top')->get();
        $sidebarBottomAd = SidebarAdvertisement::where('sidebar_ad_location','bottom')->get();
        view()->share('global_top_add_data',$topAddData);
        view()->share('global_sidebar_top_ad',$sidebarTopAd);
        view()->share('global_sidebar_bottom_ad',$sidebarBottomAd);
    }
}
