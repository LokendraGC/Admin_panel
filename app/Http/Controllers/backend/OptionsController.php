<?php

namespace App\Http\Controllers\backend;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OptionsController extends Controller
{
    public function index()
    {
        $option = Option::pluck('option_value', 'option_name')->toArray();
        return view('backend.options.options',[
            'option' => $option
        ]);
    }

    public function store(Request $request){


    //     $request->validate([
    //         'email' => 'required',
    //         'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
    //         'address' => 'required',
    //         'header_logo' => 'required | mimes:png,jpg,jpeg|max:3000',
    //         'footer_logo' => 'required | mimes:png,jpg,jpeg|max:3000'
    // ]);

        $option_data = [];

        // for header logo
        if ($request->hasFile('header_logo')) {
            $file = $request->file('header_logo');
            $headerLogoPath = $file->store('','public');
        } else {
            $headerLogoPath = NULL;
        }

        // for footer logo
        if ($request->hasFile('footer_logo')) {
            $file = $request->file('footer_logo');
            $footerLogoPath = $file->store('','public');
        } else {
            $footerLogoPath = NULL;
        }

        $option_data['email'] = isset( $request->email ) ? $request->email : NULL;
        $option_data['phone'] = isset( $request->phone ) ? $request->email : NULL;
        $option_data['address'] = isset( $request->address ) ? $request->address : NULL;
        $option_data['map'] = isset( $request->map ) ? $request->map : NULL;
        $option_data['footer_description'] = isset( $request->footer_description ) ? $request->footer_description : NULL;

        $option_data['fb_url'] = isset( $request->fb_url ) ? $request->fb_url : NULL;
        $option_data['twitter_url'] = isset( $request->twitter_url ) ? $request->twitter_url : NULL;
        $option_data['insta_url'] = isset( $request->insta_url ) ? $request->insta_url : NULL;
        $option_data['linkedin_url'] = isset( $request->linkedin_url ) ? $request->linkedin_url : NULL;
        $option_data['youtube_url'] = isset( $request->youtube_url ) ? $request->youtube_url : NULL;

        $option_data['header_logo'] = $headerLogoPath;
        $option_data['footer_logo'] = $footerLogoPath;

        // dd($headerLogoPath);

        foreach ( $option_data as $key => $value ) {

            $option_meta = new Option();

            $option_meta->option_key = $key;
            $option_meta->option_value = $value;

            $option_meta->updateOrInsert(['option_name' => $key], ['option_value' => $value]);
        }

        return redirect()->route('admin.options.index');

    }
}
