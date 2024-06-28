<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class PostCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('backend.post_categories.index-post_category',['categories'=>$categories]);
    }

    public function store(Request $request){

        $category = new Category;

        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->type = 'category';
        $category->parent = 0;
        $category->content = $request->content;
        $category->menu_order = $request->menu_order;

        $category->save();

        return redirect()->route('admin.post.category.index');

}

    public function edit(Category $id){
        return view('backend.post_categories.edit-post_categories',[
            'category' => $id
        ]);
    }

    public function update(Category $id, Request $request){
        $category = $id;

        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->type = 'category';
        $category->parent = 0;
        $category->content = $request->content;
        $category->menu_order = $request->menu_order;
        $category->update();

        return redirect()->route('admin.post.category.edit', $category->id);
    }

    public function destroy(Category $id )
    {
        $id->delete();

        return redirect()->back();
    }
}
