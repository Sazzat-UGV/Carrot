<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function mainPage()
    {
        $categories=Category::all();
        return view('frontend.pages.home',compact('categories'));
    }
}
