<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
        public function index(){
            $posts = Post::get();

            // return $posts;

            return view('backend.posts.index-post',[
                'posts' => $posts
            ]);
        }

        public function create(){
            return view('backend.posts.create-post');
        }

        public function store(Request $request){

                $post = new Post;

                $post->user_id = 1;
                $post->title = $request->title;
                $post->slug = $request->slug;
                $post->content = $request->content;
                $post->status = $request->status;
                $post->type = 'post';

                $post->save();

                return redirect()->route('admin.post.edit', $post->id);

        }

        public function edit(Post $id){

            return view('backend.posts.edit-post',[
                'post' => $id
            ]);
        }

        public function update(Post $id, Request $request){
            $post = $id;
            $post->user_id = 1;
            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->content = $request->content;
            $post->status = $request->status;
            $post->type = 'post';
            $post->update();

            return redirect()->route('admin.post.edit', $post->id);
        }

        // public function destroy(string $id){
            // $post = Post::findOrFail($id);
        public function destroy(Post $id )
        {
            $id->delete();

            return redirect()->back();
        }
}
