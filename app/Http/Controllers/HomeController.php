<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Services\BannerService;

class HomeController extends Controller
{

    protected $bannerService;

    public function __construct(BannerService $bannerService) {
        $this->bannerService = $bannerService;
    }

	public function index() {
        $banner = $this->bannerService->getAll();

        return view('content.home', [
            'banner' => $banner
        ]);
	}
}
