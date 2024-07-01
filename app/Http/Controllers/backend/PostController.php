<?php

namespace App\Http\Controllers\backend;

use App\Models\Post;
use App\Models\Category;
use App\Models\PostMeta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
        public function index(){

            $posts = Post::where('type','post')->get();

            return view('backend.posts.index-post',[
                'posts' => $posts
            ]);
        }

        public function create(){

            $categories = Category::get();

            return view('backend.posts.create-post',[
                'categories' => $categories
            ]);
        }

        public function store(Request $request){

                // return $request;

            $request->validate([
                    'title' => ['required', 'unique:posts', 'max:255'],
                    'slug'  => 'required',
                    'content' => 'required',
                    'status' => 'required',
            ]);

                $file = $request->file('featured_image');

                $request->validate([
                    'featured_image' => 'required | mimes:png,jpg,jpeg|max:3000'
                ]);

                $post = new Post;

                $post->user_id = Auth::user()->id;
                $post->title = $request->title;
                $post->slug = $request->slug;
                $post->content = $request->content;
                $post->status = $request->status;
                $post->type = 'post';

                $post->save();

                $metadata = [];
                $metadata['seo_title'] = $request->seo_title;
                $metadata['seo_description'] = $request->seo_description;
                $metadata['featured_image'] = $request->featured_image->store('','public');

                foreach ( $metadata as $key => $value ) {
                    $post_meta = new PostMeta();

                    $post_meta->post_id = $post->id;
                    $post_meta->meta_key = $key;
                    $post_meta->meta_value = $value;
                    $post_meta->save();

                }

                return redirect()->route('admin.post.edit', $post->id);

        }

        public function edit(Post $id){
            $postMeta = $id->postMeta->pluck('meta_value', 'meta_key')->toArray();

            // dd($postMeta);

            return view('backend.posts.edit-post',[
                'post' => $id,
                'postMeta' => $postMeta
            ]);
        }

        public function update(Post $id, Request $request){

            $postMeta = $id->postMeta->pluck('meta_value', 'meta_key')->toArray();

            $post = $id;
            $post->user_id = 1;
            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->content = $request->content;
            $post->status = $request->status;
            $post->type = 'post';

            $post->update();

            $metadata = [];
            $metadata['seo_title'] = $request->seo_title;
            $metadata['seo_description'] = $request->seo_description;

            foreach ( $metadata as $key => $value ) {
                $post_meta = new PostMeta();

                 $post->postMeta()->updateOrInsert(
                  ['post_id' => $post->id, 'meta_key' => $key],
                  ['meta_value' => $value]
                );

                $post_meta->update();

            }

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
