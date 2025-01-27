<?php

namespace App\Http\Controllers\Backend;

use App\Models\Newsletter;
use App\Mail\NewsLetterMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
   public function index(){
    $news_letters=Newsletter::latest('id')->get();
    return view('backend.pages.news_letter.index',compact('news_letters'));
   }

   public function formGet(){
    return view('backend.pages.news_letter.form');
   }

   public function formPost(Request $request){
    $request->validate([
        'title'=>'required',
        'description'=>'required',
    ]);
    $title=$request->title;
    $description=$request->description;
    $news_letters=Newsletter::select('email')->get();
    foreach($news_letters as $news_letter){
        Mail::to($news_letter->email)->send(new NewsLetterMail($title,$description));
    }
    return redirect()->route('admin.newsLetter')->with('success','Email sent successfully.');
   }
}
