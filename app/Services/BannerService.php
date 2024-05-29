<?php

namespace App\Services;

use App\Models\Banner;
use App\Repositories\BannerRepository;

class BannerService {
    protected $bannerRepository;

    public function __construct(BannerRepository $bannerRepository) {
        $this->bannerRepository = $bannerRepository;
    }

    public function getAll() {
        return $this->bannerRepository->getAll();
    }
}
