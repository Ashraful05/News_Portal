<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class AdminSocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SocialMedia::get();
        return view('admin.social_media.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SocialMedia $socialMedia)
    {
        return view('admin.social_media.form',compact('socialMedia'));
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
            'icon'=>'required',
            'url'=>'required'
        ]);
        SocialMedia::create([
           'icon'=>$request->icon,
           'url'=>$request->url
        ]);
        return redirect()->route('socialMedia.index')->with('success','Data Inserted Successfully');
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
    public function edit(SocialMedia $socialMedia)
    {
        return view('admin.social_media.form',compact('socialMedia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SocialMedia $socialMedia)
    {
        $request->validate([
            'icon'=>'required',
            'url'=>'required'
        ]);
        $socialMedia->update([
            'icon'=>$request->icon,
            'url'=>$request->url
        ]);
        return redirect()->route('socialMedia.index')->with('success','Data Inserted Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialMedia $socialMedia)
    {
        $socialMedia->delete();
        return redirect()->route('socialMedia.index')->with('error','Data Deleted!!!');
    }
}
