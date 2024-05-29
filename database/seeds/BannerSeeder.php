<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $data = [
            ['title' => 'Banner 1', 'image_name' => 'screen.png', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Banner 2', 'image_name' => 'screen-1.png', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Banner 3', 'image_name' => 'screen-3.png', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now]
        ];

        Banner::insert($data);
    }
}
