<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class AdminPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::get();
        return view('admin.photo.index',compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Photo $photo)
    {
        return view('admin.photo.form',compact('photo'));
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
           'caption'=>'required',
           'photo'=>'required|image|mimes:jpg,jpeg,png,gif,webp'
        ]);
        $ext = $request->file('photo')->extension();
        $finalName = 'photo_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$finalName);
        Photo::create([
           'caption'=>$request->caption,
           'photo'=>$finalName,
        ]);
        return redirect()->route('photo.index')->with('success','Photo Data Saved Successfully!');
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
    public function edit(Photo $photo)
    {
        return view('admin.photo.form',compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $oldImage = $request->old_image;
        if($request->hasFile('photo')){
            if(!empty($oldImage)){
                unlink(public_path('uploads/'.$photo->photo));
            }
            $request->validate([
                'photo'=>'required|image|mimes:jpg,jpeg,png,gif,webp'
            ]);
            $ext = $request->file('photo')->extension();
            $finalName = 'photo_'.time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$finalName);
            $photo->photo = $finalName;

            $photo->update([
                'caption'=>$request->caption,
                'photo'=>$finalName,
            ]);

        }else{
            $photo->update([
                'caption'=>$request->caption,
            ]);
        }

        return redirect()->route('photo.index')->with('success','Photo Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        if(empty($photo->photo)){
            $photo->delete();
        }else{
            unlink('uploads/'.$photo->photo);
            $photo->delete();
        }
        return redirect()->back()->with('error','Photo data deleted!!');
    }
}
