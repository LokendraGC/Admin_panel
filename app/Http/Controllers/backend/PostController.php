<?php

namespace App\Http\Controllers\backend;

use App\Models\Post;
use App\Models\Category;
use App\Models\PostMeta;
use Illuminate\Http\Request;
use App\Traits\SlugGenerateTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
       use SlugGenerateTrait;

        public function index(){

            $posts = Post::where('type','post')->get();
            $total_posts = $posts->count();

            $post_publish = Post::where(['type'=>'post','status'=>'publish'])->count();

            return view('backend.posts.index-post',[
                'total_posts' => $total_posts,
                'posts' => $posts,
                'post_publish' => $post_publish
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

            $request->validate([
                'featured_image' => 'required | mimes:png,jpg,jpeg|max:3000'
            ]);

                $file = $request->file('featured_image');

                $post = new Post;

                $post->user_id = Auth::user()->id;
                $post->title = $request->title;
                $post->slug = $this->createSlug( $request->title, $request->slug, $post);
                $post->content = $request->content;
                $post->status = isset( $request->status ) ? $request->status : [];
                $post->type = 'post';

                $post->save();

                $categories = isset( $request->category ) ? $request->category : [];

                $existingCategoryIds = Category::whereIn('id', $categories)->pluck('id')->toArray();

                if ( $post->exists() ) {

                    $post->categories()->sync($existingCategoryIds);
                }
                else {

                    $post->categories()->attach($existingCategoryIds);
                }

                // $post = Post::with('categories')->get();
                // return $post;

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


        $categories = Category::get();

        $postMeta = $id->postMeta->pluck('meta_value', 'meta_key')->toArray();

            // dd($postMeta);

            return view('backend.posts.edit-post',[
                'post' => $id,
                'postMeta' => $postMeta,
                'categories' => $categories
            ]);
        }

        public function update(Post $id, Request $request){

            // return $request;
            $postMeta = $id->postMeta->pluck('meta_value', 'meta_key')->toArray();

            $post = $id;
            $post->user_id = Auth::user()->id;
            $post->title = $request->title;
            $post->slug = $this->getSlug( $request->title, $request->slug, $post);
            $post->content = $request->content;
            $post->status = isset( $request->status )? $request->status : [];
            $post->type = 'post';

            // $request->validate([
            //     'featured_image' => 'required | mimes:png,jpg,jpeg|max:3000'
            // ]);

            $file = isset( $request->featured_image_remove ) ? ($request->hasFile('featured_image') ? $request->file('featured_image')->store('', 'public') : NULL) : ($request->hasFile('featured_image') ? $request->file('featured_image')->store('', 'public') : $postMeta['featured_image']);

            $post->update();

            $categories = isset( $request->category ) ? $request->category : [];

            $existingCategoryIds = Category::whereIn('id', $categories)->pluck('id')->toArray();

            if ( $post->exists() ) {

                $post->categories()->sync($existingCategoryIds);
            }
            else {

                $post->categories()->attach($existingCategoryIds);
            }


            $metadata = [];
            $metadata['seo_title'] = $request->seo_title;
            $metadata['seo_description'] = $request->seo_description;
            $metadata['featured_image'] = $file;

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
