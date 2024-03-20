<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeoUpdateRequest;
use App\Models\Seo;
use Brian2694\Toastr\Facades\Toastr;

class SettingController extends Controller
{
    public function seo()
    {
        $seo = Seo::findOrFail(1);
        return view('admin.pages.setting.seo', compact('seo'));
    }

    public function seoUpdate(SeoUpdateRequest $request, $id)
    {
        $seo = Seo::findOrFail($id);
        $seo->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_tag' => $request->meta_tag,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_verification' => $request->google_verification,
            'alexa_verification' => $request->alexa_verification,
            'google_analytics' => $request->google_analytics,
            'google_absense' => $request->google_absense,
        ]);
        Toastr::success('SEO setting updated successfully!');
        return back();
    }
}
