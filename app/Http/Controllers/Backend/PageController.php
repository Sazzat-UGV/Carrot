<?php

namespace App\Http\Controllers\Backend;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function termsConditionPage()
    {
        $page = Page::where('id', 1)->first();
        return view('backend.pages.setting.terms_condition', compact('page'));
    }
    public function termsCondition(Request $request)
    {
        $page = Page::where('id', 1)->first();
        $request->validate([
            'terms_condition' => 'required|string',
        ]);
        $page->update([
            'terms_condition' => $request->terms_condition,
        ]);
        return redirect()->back()->with('success', 'Terms & Conditions updated successfully.');
    }
    public function privacyPolicyPage()
    {
        $page = Page::where('id', 1)->first();
        return view('backend.pages.setting.privacy_policy', compact('page'));
    }
    public function privacyPolicy(Request $request)
    {
        $request->validate([
            'privacy_policy' => 'required|string',
        ]);
        $page = Page::where('id', 1)->first();
        $page->update([
            'privacy_policy' => $request->privacy_policy,
        ]);
        return redirect()->back()->with('success', 'Privacy Policy updated successfully.');
    }
}
