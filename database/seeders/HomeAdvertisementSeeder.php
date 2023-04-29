<?php

namespace Database\Seeders;

use App\Models\HomeAdvertisement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeAdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       HomeAdvertisement::create([
           'above_search_ad'=>'above_search_ad.png',
           'above_search_ad_status'=>'show',
           'above_footer_ad'=>'above_footer.ad.png',
           'above_footer_ad_status'=>'show'
       ]);
    }
}
