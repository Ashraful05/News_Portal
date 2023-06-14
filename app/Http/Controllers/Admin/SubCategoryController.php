<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::with('rCategory')->get();
        return view('admin.subcategory.index',compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(SubCategory $subcategory)
    {
        $categories = Category::get();
        return view('admin.subcategory.form',compact('subcategory','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'sub_category_name'=>'required',
            'show_on_menu'=>'required',
            'sub_category_order'=>'required',
            'category_id'=>'required',
        ],[
            'category_id.required'=>'The Category Name is Required'
        ]);
        SubCategory::create([
           'sub_category_name'=>$request->sub_category_name,
            'show_on_menu'=>$request->show_on_menu,
            'show_on_home_page'=>$request->show_on_home_page,
            'sub_category_order'=>$request->sub_category_order,
            'category_id'=>$request->category_id
        ]);
        return redirect()->route('subcategory.index')->with('success','Data Saved Successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subcategory)
    {
        $categories = Category::get();
//        return $subcategory;
        return view('admin.subcategory.form',compact('categories','subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subcategory)
    {
        $request->validate([
            'sub_category_name'=>'required',
            'show_on_menu'=>'required',
            'sub_category_order'=>'required',
            'category_id'=>'required',
        ],[
            'category_id.required'=>'The Category Name is Required'
        ]);
        $subcategory->update([
            'sub_category_name'=>$request->sub_category_name,
            'show_on_menu'=>$request->show_on_menu,
            'show_on_home_page'=>$request->show_on_home_page,
            'sub_category_order'=>$request->sub_category_order,
            'category_id'=>$request->category_id
        ]);
        return redirect()->route('subcategory.index')->with('success','Data Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('subcategory.index')->with('error','Data Deleted!!');
    }
}
