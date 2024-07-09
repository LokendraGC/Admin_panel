<?php

namespace App\Http\Controllers\backend;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::pluck('setting_value','setting_name')->toArray();

        return view('backend.settings.settings',[
            'setting_data' => $setting
        ]);
    }

    public function store(Request $request)
    {
        // return $request;
        $setting_data = [];
        $setting = Setting::pluck('setting_value', 'setting_name')->toArray();

        $site_fav = isset( $request->site_favicon_remove ) ? ($request->hasFile('site_favicon') ? $request->file('site_favicon')->store('', 'public') : NULL) : ($request->hasFile('site_favicon') ? $request->file('site_favicon')->store('', 'public') : $setting['site_favicon']);

        $setting_data['site_title'] = $request->site_title ?? NULL;
        $setting_data['adminstration_email'] = $request->adminstration_email ?? NULL;
        $setting_data['select_homepage'] =  $request->select_homepage ?? NULL;
        $setting_data['site_favicon'] = $site_fav;

        foreach( $setting_data as $key =>  $value)
        {
            $setting_meta = new Setting;
            $setting_meta->updateOrInsert(['setting_name' => $key], ['setting_value' => $value]);
        }


        return to_route('admin.settings.index');
    }
}
