<?php

namespace App\Http\Controllers\author;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Author;
use App\Models\NewsPosts;
use App\Models\SubCategory;
use App\Models\Subscriber;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AuthorPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = NewsPosts::with('rSubCategory')->where('author_id',Auth::guard('author')->user()->id)->get();
        return view('author.post_show',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Author $author)
    {
        $subCategories = SubCategory::with('rCategory')->get();
        return view('author.post_create',compact('subCategories','author'));
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
            'post_title'=>'required',
            'post_detail'=>'required',
            'post_photo'=>'required|image|mimes:jpg,jpeg,png,gif,webp'
        ]);

        $q = DB::select("SHOW TABLE STATUS LIKE 'news_posts'");
        $autoIncrementId = $q[0]->Auto_increment;
//        dd($autoIncrementId);

        $ext = $request->file('post_photo')->extension();
        $finalName = 'news_post_'.time().'.'.$ext;
        $request->file('post_photo')->move(public_path('uploads/'),$finalName);

        NewsPosts::create([
            'sub_category_id'=>$request->sub_category_id,
            'post_title'=>$request->post_title,
            'post_detail'=>$request->post_detail,
            'visitors'=>1,
            'author_id'=>Auth::guard('author')->user()->id,
            'admin_id'=>0,
            'is_share'=>$request->is_share,
            'is_comment'=>$request->is_comment,
            'post_photo'=>$finalName,
        ]);

        if($request->tags != ''){
            $tagsArray = explode(',',$request->tags);
            $tagsArrayUnique = [];//this array variable is to prevent duplicate values
            for($i=0;$i<count($tagsArray);$i++)
            {
                $tagsArrayUnique[]=trim($tagsArray[$i]);
            }
            $tagsArrayUnique = array_values(array_unique($tagsArrayUnique));
            for($i=0;$i<count($tagsArrayUnique);$i++)
            {
                Tag::create([
                    'post_id'=>$autoIncrementId,
                    'tag_name'=>trim($tagsArrayUnique[$i])
                ]);
            }
        }

        if($request->subscriber_send_option == 1)
        {
            $subject = 'A new post is published';
            $message = 'Hi, a new post is published into our website. Please click on the following link to see that post:<br>';
            $message .= '<a target="_blank" href="'.route('news_details',$autoIncrementId).'">';
            $message .= $request->post_title;
            $message .= '</a>';

            $subscribers = Subscriber::where('status','active')->get();
            foreach ($subscribers as $row){
                Mail::to($row->email)->send(new Websitemail($subject,$message));
            }
        }

        return redirect()->route('post.index')->with('success','Post Info Saved Successfully!');
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
        $subCategories = SubCategory::with('rCategory')->get();
        $tags = Tag::where('post_id',$author->id)->get();
//        return $tags;
        return view('author.post_create',compact('author','subCategories','tags'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
