<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Models\PostMeta;
use App\Models\CategoryMeta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('backend.post_categories.index-post_category',['categories'=>$categories]);
    }

    public function store(Request $request){

        // return $request;

        $category = new Category;

        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->type = 'category';
        $category->parent = 0;
        $category->content = $request->content;
        $category->menu_order = $request->menu_order;

        // $request->validate([
        //     'category_image' => 'required | mimes:png,jpg,jpeg|max:3000'
        // ]);

        $file = $request->file('category_image');

        // dd($file);
        $category->save();

        $meta_data = [];
        $meta_data['category_image'] = $request->category_image->store('','public');
        // $meta_data['menu_order'] = $request->menu_order;

        foreach( $meta_data as $key => $value ){
            $category_meta = new CategoryMeta;

            $category_meta->category_id = $category->id;
            $category_meta->meta_key = $key;
            $category_meta->meta_value = $value;

            $category_meta->save();
        }

        return redirect()->route('admin.post.category.index');

}

    public function edit(Category $id){

        $categoryMeta = $id->categoryMeta->pluck('meta_value', 'meta_key')->toArray();

        return view('backend.post_categories.edit-post_categories',[
            'category' => $id,
            'categoryMeta' => $categoryMeta
        ]);
    }

    public function update(Category $id, Request $request){
        $category = $id;

        $categoryMeta = $id->categoryMeta->pluck('meta_value', 'meta_key')->toArray();

        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->type = 'category';
        $category->parent = 0;
        $category->content = $request->content;
        $category->menu_order = $request->menu_order;

        $category_file = isset( $request->category_image_remove ) ? ($request->hasFile('category_image') ? $request->file('category_image')->store('', 'public') : NULL) : ($request->hasFile('category_image') ? $request->file('category_image')->store('', 'public') : $categoryMeta['category_image']);

        // dd($category_file);

        $category->update();

        $metadata = [];
        $metadata['category_image'] = $category_file;
        // $meta_data['menu_order'] = $request->menu_order;

        foreach ( $metadata as $key => $value ) {
            $category_meta = new CategoryMeta();

             $category->categoryMeta()->updateOrInsert(
              ['category_id' => $category->id, 'meta_key' => $key],
              ['meta_value' => $value]
            );

            $category_meta->update();

        }

        return redirect()->route('admin.post.category.edit', $category->id);
    }

    public function destroy(Category $id )
    {
        $id->delete();

        return redirect()->back();
    }

    public function assignCategory($payload, $ids)
    {

        return $payload;

        if (!$payload instanceof Post) {
            throw new \InvalidArgumentException('$payload must be an instance of Post');
        }

        $existingCategoryIds = Category::whereIn('id', $ids)->pluck('id')->toArray();

        if ( $payload->exists() ) {

            $payload->categories()->sync($existingCategoryIds);
        }
        else {

            $payload->categories()->attach($existingCategoryIds);
        }

        return true;
    }
}
