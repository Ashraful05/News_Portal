<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\LiveChannel;
use App\Models\NewsPosts;
use App\Models\OnlinePoll;
use App\Models\Page;
use App\Models\Setting;
use App\Models\SidebarAdvertisement;
use App\Models\SocialMedia;
use App\Models\SubCategory;
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
        $globalCategories = Category::with('rSubCategory')->where('show_on_menu','show')->orderby('category_order','asc')->get();
        $globalPageData = Page::where('id',1)->first();
        $liveChannelData = LiveChannel::get();
        $recentNewsData = NewsPosts::orderby('id','desc')->limit(4)->get();
        $popularNewsData = NewsPosts::orderby('visitors','desc')->limit(4)->get();
        $onlinePollData = OnlinePoll::orderby('id','desc')->first();
        $socialMedia = SocialMedia::get();
        $settingsData = Setting::where('id',1)->first();

        view()->share('global_top_add_data',$topAddData);
        view()->share('global_sidebar_top_ad',$sidebarTopAd);
        view()->share('global_sidebar_bottom_ad',$sidebarBottomAd);
        view()->share('global_categories',$globalCategories);
        view()->share('global_pages',$globalPageData);
        view()->share('global_live_channel',$liveChannelData);
        view()->share('global_recent_news_data',$recentNewsData);
        view()->share('global_popular_news_data',$popularNewsData);
        view()->share('global_online_poll_data',$onlinePollData);
        view()->share('global_social_media',$socialMedia);
        view()->share('global_setting_data',$settingsData);
    }
}
