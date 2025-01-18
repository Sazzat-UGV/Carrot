<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;

class HomeController extends Controller
{
    public function homePage()
    {
        $sliders = Slider::where('status', 1)->latest('id')->get();
        return view('frontend.pages.home_page', compact('sliders'));
    }
}
