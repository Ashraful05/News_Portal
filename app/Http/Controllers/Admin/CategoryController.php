<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryShow()
    {
        $categories = Category::with('rLanguage')->orderBy('category_order','asc')->get();
        return view('admin.category.show_category',compact('categories'));
    }
    public function CategoryCreate()
    {
        return view('admin.category.create_category');
    }
    public function CategorySave(Request $request)
    {
        $request->validate([
            'category_name'=>'required',
            'category_order'=>'required',
        ]);
        Category::create([
           'category_name'=>$request->category_name,
           'show_on_menu'=>$request->show_on_menu,
           'category_order'=>$request->category_order,
            'language_id'=>$request->language_id
        ]);
        return redirect()->route('admin_category_show')->with('success','Category Data Saved!!');
    }
    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.admin_category_edit',compact('category'));
    }
    public function CategoryUpdate(Request $request,$id)
    {
        $request->validate([
            'category_name'=>'required',
            'category_order'=>'required',
        ]);
        Category::findOrFail($id)->update([
            'category_name'=>$request->category_name,
            'show_on_menu'=>$request->show_on_menu,
            'category_order'=>$request->category_order,
            'language_id'=>$request->language_id
        ]);
        return redirect()->route('admin_category_show')->with('success','Category Data Updated!!');
    }
    public function CategoryDelete($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('admin_category_show')->with('error','Category Data Deleted');
    }
}
