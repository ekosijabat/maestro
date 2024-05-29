<?php

namespace App\Repositories;

use App\Interfaces\BannerInterface;
use App\Models\Banner;

class BannerRepository implements BannerInterface {

    protected $banner;

    public function __construct(Banner $banner) {
        $this->banner = $banner;
    }

    public function getAll() {
        return $this->banner->all();
    }
}
