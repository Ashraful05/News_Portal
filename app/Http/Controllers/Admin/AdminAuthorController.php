<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class AdminAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::get();
        return view('admin.author.index',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Author $author)
    {
        return view('admin.author.form',compact('author'));
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
            'name'=>'required',
            'email'=>'required|email|unique:authors',
            'password'=>'required',
            'retype_password'=>'required|same:password'
        ]);
        if($request->hasFile('photo')){
            $request->validate([
                'photo'=>'image|mimes:jpg,jpeg,png,gif'
            ]);
            $now = time();
            $ext = $request->file('photo')->extension();
            $finalName = 'author_'.$now.'.'.$ext;
            $request->file('photo')->move(public_path('author/assets/uploads/'),$finalName);

            Author::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'photo'=>$finalName,
                'token'=>'',
            ]);
        }else{
            Author::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'token'=>'',
            ]);
        }


        $subject = 'Your author account is created!';
        $message = 'Hi,your account is created successfully and now you can login to our system from login page:
<br><br>';
        $message .= '<a href="'.route('front_login').'">';
        $message .= 'Click on this link';
        $message .= '</a>';
        $message .= '<br><br>Please see your password here and after login please change your password<br>';
        $message .= $request->password;

        Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->route('author.index')->with('success','Author Account is Created Successfully!');
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
    public function edit(Author $author)
    {
        return view('admin.author.form',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name'=>'required',
            'email'=>[
                'required',
                'email',
                Rule::unique('authors')->ignore($author->id)
            ]
        ]);
        if($request->password || $request->retype_password != ''){
            $request->validate([
                'password'=>'required',
                'retype_password'=>'required|same:password'
            ]);
            $author->password = Hash::make($request->password);
        }
        if($request->hasFile('photo')){
            $request->validate([
                'photo'=>'image|mimes:jpg,jpeg,png,gif'
            ]);
            if($author->photo != ''){
                unlink(public_path('author/assets/uploads/'.$author->photo));
            }
            $now = time();
            $ext = $request->file('photo')->extension();
            $finalName = 'author_'.$now.'.'.$ext;
            $request->file('photo')->move(public_path('author/assets/uploads/'),$finalName);
            $author->photo = $finalName;
        }

        $author->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);

        return redirect()->route('author.index')->with('success','Author Info Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        if($author->photo != ''){
            unlink(public_path('author/assets/uploads/'.$author->photo));
        }
        $author->delete();
        return redirect()->back()->with('error','Author Info Deleted!!!');
    }
}
