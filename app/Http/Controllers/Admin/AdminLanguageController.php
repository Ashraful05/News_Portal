<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languageData = Language::get();
        return view('admin.language.index',compact('languageData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Language $language)
    {
        return view('admin.language.form',compact('language'));
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
           'language_name'=>'required',
           'language_short_name'=>'required',
        ]);
        if($request->is_default == 'yes'){
            DB::table('languages')->update(['is_default'=>'no']);
        }
        Language::create([
            'language_name'=>$request->language_name,
            'language_short_name'=>$request->language_short_name,
            'is_default'=>$request->is_default
        ]);

        $test_data = file_get_contents(resource_path('lang/sample.json'));
        file_put_contents(resource_path('lang/'.$request->language_short_name.'.json'),$test_data);

        return redirect()->route('language.index')->with('success','Data Saved!!');
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
    public function edit(Language $language)
    {
        return view('admin.language.form',compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        if($request->is_default == 'yes'){
            DB::table('languages')->update(['is_default'=>'no']);
        }
        $language->update([
           'language_name'=>$request->language_name,
            'language_short_name'=>$request->language_short_name,
            'is_default'=>$request->is_default
        ]);
        return redirect()->route('language.index')->with('success','Data Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        if($language->is_default == 'yes'){
            DB::table('languages')->where('id',1)->update(['is_default'=>'yes']);
        }
        $language->delete();
        return redirect()->route('language.index')->with('error','Data Deleted!!');
    }
}
