<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|numeric',
            'comment'    => 'required|string',
            'rating'     => 'required|integer|min:1|max:5',
        ]);
        $review=Review::where('product_id',$request->product_id)->where('user_id',Auth::user()->id)->first();
        if($review){
            $previousUrl = url()->previous();
            $urlWithStage = $previousUrl . (parse_url($previousUrl, PHP_URL_QUERY) ? '&' : '?') . 'stage=review';
            return redirect($urlWithStage)->with('error', 'You already give a review.');
        }
        Review::create([
            'user_id'    => Auth::user()->id,
            'product_id' => $request->product_id,
            'rating'     => $request->rating,
            'comment'    => $request->comment,
        ]);

        $previousUrl = url()->previous();
        $urlWithStage = $previousUrl . (parse_url($previousUrl, PHP_URL_QUERY) ? '&' : '?') . 'stage=review';
        return redirect($urlWithStage)->with('success', 'Review submitted successfully.');
    }

    public function index(Request $request, $id)
    {
        $reviews = Review::with('user:id,name,email,image')->where('product_id', $id);
        if ($request->search) {
            $reviews = $reviews->where('comment', 'LIKE', '%' . $request->search . '%');
        }
        $reviews = $reviews->latest('id')->paginate(10);
        return view('backend.pages.product.review',compact('reviews'));
    }

    public function delete($id){
        $review=Review::findOrFail($id)->delete();
        return redirect()->back()->with('success', "Review deleted successfully.");
    }
}
