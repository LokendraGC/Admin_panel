<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
        public function index(){
            return view('backend.posts.index-post');
        }

        public function create(){
            return view('backend.posts.create-post');
        }

        public function edit(){
            return view('backend.posts.edit-post');
        }
}
