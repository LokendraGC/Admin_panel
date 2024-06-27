<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('backend.pages.index-page');
    }

    public function create(){
        return view('backend.pages.create-page');
    }

    public function edit(){
        return view('backend.pages.edit-page');
    }
}
