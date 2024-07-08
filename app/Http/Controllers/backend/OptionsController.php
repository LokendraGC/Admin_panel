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
        // $request->validate([
        //     'email' => 'required|email',
        //     'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        //     'address' => 'required',
        //     'header_image' => 'required|mimes:png,jpg,jpeg|max:3000',
        //     'footer_image' => 'required|mimes:png,jpg,jpeg|max:3000'
        // ]);

        // $headerFile = $request->file('header_image');
        // $footerFile = $request->file('footer_image');

        $option_data = [];
        $option = Option::pluck('option_value', 'option_name')->toArray();

        $header_file = isset( $request->header_image_remove ) ? ($request->hasFile('header_image') ? $request->file('header_image')->store('', 'public') : NULL) : ($request->hasFile('header_image') ? $request->file('header_image')->store('', 'public') : $option['header_image']);

        // dd($request->header_image_remove);

        $footer_file = isset( $request->footer_image_remove ) ? ($request->hasFile('footer_image') ? $request->file('footer_image')->store('', 'public') : NULL) : ($request->hasFile('footer_image') ? $request->file('footer_image')->store('', 'public') : $option['footer_image']);

        // dd($footer_file);

        $option_data['email'] = $request->email ?? NULL;
        $option_data['phone'] = $request->phone ?? NULL;
        $option_data['address'] = $request->address ?? NULL;
        $option_data['map'] = $request->map ?? NULL;
        $option_data['footer_description'] = $request->footer_description ?? NULL;

        // $option_data['header_image'] = $headerFile ? $headerFile->store('','public') : NULL;
        // $option_data['footer_image'] = $footerFile ? $footerFile->store('','public') : NULL;

        // dd($footer_file);

        $option_data['fb_url'] = $request->fb_url ?? NULL;
        $option_data['twitter_url'] = $request->twitter_url ?? NULL;
        $option_data['insta_url'] = $request->insta_url ?? NULL;
        $option_data['linkedin_url'] = $request->linkedin_url ?? NULL;
        $option_data['youtube_url'] = $request->youtube_url ?? NULL;

        $option_data['header_image'] = $header_file ? $header_file : NULL;
        $option_data['footer_image'] = $footer_file ? $footer_file : NULL;

        foreach ($option_data as $key => $value) {
            $option_meta = new Option();
            $option_meta->updateOrInsert(['option_name' => $key], ['option_value' => $value]);
        }

        return redirect()->route('admin.options.index');
    }

}
