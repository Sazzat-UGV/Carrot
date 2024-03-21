<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeoUpdateRequest;
use App\Http\Requests\SettingUpdateRequest;
use App\Http\Requests\SmtpUpdateRequest;
use App\Models\Seo;
use App\Models\Setting;
use App\Models\Smtp;
use Brian2694\Toastr\Facades\Toastr;
use Image;

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

    public function smtp()
    {
        $smtp = Smtp::findOrFail(1);
        return view('admin.pages.setting.smtp', compact('smtp'));
    }

    public function smtpUpdate(SmtpUpdateRequest $request, $id)
    {
        $smtp = Smtp::findOrFail($id);
        $smtp->update([
            'mail_mailer' => $request->mail_mailer,
            'mail_host' => $request->mail_host,
            'mail_port' => $request->mail_port,
            'mail_username' => $request->mail_username,
            'mail_password' => $request->mail_password,
            'mail_encryption' => $request->mail_encryption,
        ]);
        Toastr::success('SMTP setting updated successfully!');
        return back();
    }

    public function website()
    {
        $setting = Setting::findOrFail(1);
        return view('admin.pages.setting.website', compact('setting'));
    }

    public function websiteUpdate(SettingUpdateRequest $request, $id)
    {
        $setting = Setting::findOrFail($id);
        $setting->update([
            'currency' => $request->currency,
            'phone_one' => $request->phone_one,
            'phone_two' => $request->phone_two,
            'main_email' => $request->main_email,
            'support_email' => $request->support_email,
            'address' => $request->address,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'youtube' => $request->youtube,
        ]);
        if ($request->hasFile('logo')) {
            $photo_loation = 'public/uploads/setting/';
            $uploaded_photo = $request->file('logo');
            $new_photo_name = 'logo' . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            $status = Image::make($uploaded_photo)->resize(320, 120)->save(base_path($new_photo_location));
            $setting->update([
                'logo' => $new_photo_name,
            ]);
        }
        if ($request->hasFile('favicon')) {
            $photo_loation = 'public/uploads/setting/';
            $uploaded_photo = $request->file('favicon');
            $new_photo_name = 'favicon' . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            $status = Image::make($uploaded_photo)->resize(32, 32)->save(base_path($new_photo_location));
            $setting->update([
                'favicon' => $new_photo_name,
            ]);
        }
        Toastr::success('Website setting updated successfully!');
        return back();
    }
}
