<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Image;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $setting = GeneralSetting::where('id', 1)->first();
        return view('backend.pages.setting.general_setting', compact('setting'));
    }

    public function setting_submit(Request $request)
    {
        $setting = GeneralSetting::where('id', 1)->first();

        if ($request->hasAny(['site_name', 'site_logo', 'site_favicon', 'site_description', 'site_keywords','currency'])) {
            $request->validate([
                'site_name' => 'nullable|string|max:50',
                'site_logo' => 'sometimes|image|mimes:png,jpg,jpeg',
                'site_favicon' => 'sometimes|mimes:png,jpg,jpeg',
            ]);
            $setting->update([
                'site_name' => $request->site_name,
                'site_description' => $request->site_description,
                'site_keywords' => $request->site_keywords,
                'currency' => $request->currency,
            ]);
            $this->image_upload($request, $setting);
            return redirect()->route('admin.general_setting_page', ['stage' => 'site'])->with('success', 'Setting has been updated.');
        }

        if ($request->hasAny(['email', 'phone_number', 'physical_address'])) {
            $request->validate([
                'email' => 'nullable|email',
            ]);
            $setting->update([
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'physical_address' => $request->physical_address,
            ]);

            return redirect()->route('admin.general_setting_page', ['stage' => 'contact'])->with('success', 'Setting has been updated.');
        }

        if ($request->hasAny(['map'])) {
            $request->validate([
                'map' => 'nullable',
            ]);
            $setting->update([
                'map' => $request->map,
            ]);

            return redirect()->route('admin.general_setting_page', ['stage' => 'map'])->with('success', 'Setting has been updated.');
        }

        if ($request->hasAny(['facebook_url', 'instagram_url', 'twitter_url', 'youtube_url', 'linkedin_url'])) {
            $setting->update([
                'facebook_url' => $request->facebook_url,
                'twitter_url' => $request->twitter_url,
                'instagram_url' => $request->instagram_url,
                'youtube_url' => $request->youtube_url,
                'linkedin_url' => $request->linkedin_url,
            ]);
            return redirect()->route('admin.general_setting_page', ['stage' => 'social'])->with('success', 'Setting has been updated.');
        }

        if ($request->hasFile('breadcrumb_image')) {
            $request->validate([
                'breadcrumb_image' => 'sometimes|image|mimes:png,jpg,jpeg',
            ]);

            $this->image_upload($request, $setting);

            return redirect()->route('admin.general_setting_page', ['stage' => 'breadcrumb'])->with('success', 'Setting has been updated.');
        } else {
            return redirect()->route('admin.general_setting_page', ['stage' => 'breadcrumb'])->with('error', 'No image was uploaded.');
        }
    }

    public function image_upload($request, $setting)
    {
        if ($request->hasFile('site_logo')) {
            $photo_loation = 'public/uploads/settings/';
            $uploaded_photo = $request->file('site_logo');
            $new_photo_name = 'logo' . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->save(base_path($new_photo_location));
            $check = $setting->update([
                'site_logo' => $new_photo_name,
            ]);
        }
        if ($request->hasFile('site_favicon')) {
            $photo_location = 'public/uploads/settings/';
            $uploaded_photo = $request->file('site_favicon');
            $new_photo_name = 'favicon' . '.' . $uploaded_photo->getClientOriginalExtension();
            $uploaded_photo->move(base_path($photo_location), $new_photo_name);
            $check = $setting->update([
                'site_favicon' => $new_photo_name,
            ]);
        }

        if ($request->hasFile('breadcrumb_image')) {
            $photo_loation = 'public/uploads/settings/';
            $uploaded_photo = $request->file('breadcrumb_image');
            $new_photo_name = 'breadcrumb' . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->save(base_path($new_photo_location));
            $check = $setting->update([
                'breadcrumb_image' => $new_photo_name,
            ]);
        }
    }
}
