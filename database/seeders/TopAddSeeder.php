<?php

namespace Database\Seeders;

use App\Models\TopAdvertisement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopAddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TopAdvertisement::create([
           'top_search_ad'=>'top_add',
           'top_search_ad_status'=>'show',
        ]);
    }
}
