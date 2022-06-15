<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Setting;

class SettingController extends Controller
{
    public function showSettings()
    {
        return view('admin.settings.settings');
    }

    public function updateSettings(Request $request)
    {
        Setting::set('website_phone', request('website_phone'));
        Setting::set('about_ar', request('about_ar'));
        Setting::set('about_en', request('about_en'));
        Setting::set('terms_ar', request('terms_ar'));
        Setting::set('terms_en', request('terms_en'));
        Setting::set('privacy_ar', request('privacy_ar'));
        Setting::set('privacy_en', request('privacy_en'));
        Setting::set('android_download_link', request('android_download_link'));
        Setting::set('ios_download_link', request('ios_download_link'));
        Setting::set('facebook', request('facebook'));
        Setting::set('twitter', request('twitter'));
        Setting::set('instagram', request('instagram'));
        Setting::set('linkedin', request('linkedin'));
        Setting::save();
        session()->flash('success', trans('admin.setting-edit-messaage'));
        return redirect()->back();
    }

    public function terms()
    {
        $terms = Setting::get('terms_ar');
        return view('admin.settings.terms', compact('terms'));
    }

    public function privacy()
    {
        $privacy = Setting::get('privacy_ar');
        return view('admin.settings.privacy', compact('privacy'));
    }
}
