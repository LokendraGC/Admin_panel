<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use App\Models\Page;
use App\Models\Post;
use App\Models\PostMeta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\SlugGenerateTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    use SlugGenerateTrait;

    public function index(){

        $pages =  Post::where('type','page')->get();
        $allPage = $pages->count();
        $publish_page = Post::where(['type' => 'page','status' => 'publish'])->count();

        return view('backend.pages.index-page',[
                'pages' => $pages,
                'allPages' => $allPage,
                'publish_pages' => $publish_page
        ]);

    }

    public function create(){

        $pages = Post::where('type','page')->get();

        return view('backend.pages.create-page',[
            'pages' => $pages
        ]);
    }


    public function store(Request $request){

        // $request->validate([
        //         'title' => 'required|unique:pages,max:255',
        //         'slug' => 'required',
        //         'status' => 'required'
        //     ]);

        $file = $request->file('featured_image');

            //     $request->validate([
            //     'featured_image' => 'required|mimes:png,jpg,jpeg|max:3000'
            // ]);

                $post = new Post;

                $post->user_id = Auth::user()->id;
                $post->title = $request->title;
                // $post->slug = $request->slug ? $request->slug : Str::slug($request->title);
                $post->slug = $this->createSlug( $request->title, $request->slug, $post);
                $post->content = $request->content;
                $post->status = isset( $request->status ) ? $request->status : [];
                $post->type = 'page';

                $post->save();

                $metadata = [];
                $metadata['seo_title'] = $request->seo_title;
                $metadata['seo_description'] = $request->seo_description;
                $metadata['page_template'] = $request->page_template;
                $metadata['featured_image'] = $request->featured_image->store('','public');

                foreach ( $metadata as $key => $value ) {
                    $post_meta = new PostMeta();

                    $post_meta->post_id = $post->id;
                    $post_meta->meta_key = $key;
                    $post_meta->meta_value = $value;
                    $post_meta->save();

                }

                return redirect()->route('admin.page.edit', $post->id);
    }


    public function edit(Post $id){

        // return $id;
        $postMeta = $id->postMeta->pluck('meta_value','meta_key')->toArray();
        $pages = Post::where('type','page')->get();

        $post = $id;
        $createdAtFormatted = Carbon::parse($post->created_at)->format('m/d/Y h:i A');

        return view('backend.pages.edit-page',[
            'post' => $id,
            'postMeta' => $postMeta,
            'pages' => $pages,
            'created_at' => $createdAtFormatted

        ]);
    }

    public function update(Post $id, Request $request){


        $postMeta = $id->postMeta->pluck('meta_value', 'meta_key')->toArray();

        $post = $id;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->created_at = $request->date_time ? $request->date_time : $post->created_at;
        $post->slug = $this->getSlug( $request->title, $request->slug, $post);
        $post->content = $request->content;
        $post->status =  $post->status = isset( $request->status ) ? $request->status : [];
        $post->type = 'page';

        $file = isset( $request->featured_image_remove ) ? ($request->hasFile('featured_image') ? $request->file('featured_image')->store('', 'public') : NULL) : ($request->hasFile('featured_image') ? $request->file('featured_image')->store('', 'public') : $postMeta['featured_image']);

        $post->update();

        $metadata = [];
        $metadata['seo_title'] = $request->seo_title;
        $metadata['seo_description'] = $request->seo_description;
        $metadata['page_template'] = $request->page_template;
        $metadata['featured_image'] = $file;

        // dd($metadata);
        foreach ( $metadata as $key => $value ) {
            $post_meta = new PostMeta();

             $post->postMeta()->updateOrInsert(
              ['post_id' => $post->id, 'meta_key' => $key],
              ['meta_value' => $value]
            );

        }

        return redirect()->route('admin.page.edit', $post->id);
    }

    public function destroy(Post $id){


          $id->delete();
          return redirect()->back();

    }



}
