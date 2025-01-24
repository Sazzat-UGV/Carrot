<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCard(Request $request)
    {
        $a=$request;
        return response()->json([
            'status'=>true,
            'message'=>'Product Added Successfully',

        ]);
    }
}
