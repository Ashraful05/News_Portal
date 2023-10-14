<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Admin;
use App\Models\Author;
use App\Models\NewsPosts;
use App\Models\SubCategory;
use App\Models\Subscriber;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class NewsPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = NewsPosts::with('rSubCategory')->get();
//        return $posts;
        return view('admin.news_post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(NewsPosts $newspost)
    {
        $subCategories = SubCategory::with('rCategory')->get();
//        return $subCategories;
        return view('admin.news_post.form',compact('newspost','subCategories'));
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
            'author_id'=>0,
            'admin_id'=>Auth::guard('admin')->user()->id,
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

        return redirect()->route('newspost.index')->with('success','Post Info Saved Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tagData = Tag::where('post_id',$id)->get();
        $postDetail = NewsPosts::with('rSubCategory')->where('id',$id)->first();
        if($postDetail->author_id == 0){
           $userData = Admin::where('id',$postDetail->admin_id)->first();
        }else{
            $userData = Author::where('id',$postDetail->author_id)->first();
        }
//        return view('frontend.news_post_details');
        return view('frontend.news_detail',compact('userData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsPosts $newspost)
    {
//        return $newspost;
        $subCategories = SubCategory::with('rCategory')->get();
        $tags = Tag::where('post_id',$newspost->id)->get();
//        return $tags;
        return view('admin.news_post.form',compact('newspost','subCategories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsPosts $newspost)
    {
        $oldImage = $request->old_image;
        if($request->hasFile('post_photo')){
            if(!empty($oldImage)){
                unlink(public_path('uploads/'.$newspost->post_photo));
            }
            $request->validate([
                'post_photo'=>'required|image|mimes:jpg,jpeg,png,gif,webp'
            ]);

            $ext = $request->file('post_photo')->extension();
            $finalName = 'news_post_'.time().'.'.$ext;
            $request->file('post_photo')->move(public_path('uploads/'),$finalName);
            $newspost->post_photo=$finalName;
            $newspost->update([
                'post_photo'=>$finalName,
                'sub_category_id'=>$request->sub_category_id,
                'post_title'=>$request->post_title,
                'post_detail'=>$request->post_detail,
                'visitors'=>1,
                'author_id'=>0,
                'admin_id'=>Auth::guard('admin')->user()->id,
                'is_share'=>$request->is_share,
                'is_comment'=>$request->is_comment,
            ]);
        }else{
            $newspost->update([
                'sub_category_id'=>$request->sub_category_id,
                'post_title'=>$request->post_title,
                'post_detail'=>$request->post_detail,
                'visitors'=>1,
                'author_id'=>0,
                'admin_id'=>Auth::guard('admin')->user()->id,
                'is_share'=>$request->is_share,
                'is_comment'=>$request->is_comment,
            ]);
        }
        if(!empty($request->tags)){
            $tagsArray = explode(',',$request->tags);
//            return $tagsArray;
            for($i=0;$i<count($tagsArray);$i++)
            {
                $total = Tag::where('post_id',$newspost->id)->where('tag_name',trim($tagsArray[$i]))->count();
//                return $total;
                if(empty($total)){
                        $tag = new Tag();
                        $tag->post_id = $newspost->id;
                        $tag->tag_name = trim($tagsArray[$i]);
                        $tag->save();
                }
            }
        }

        return redirect()->route('newspost.index')->with('success','Post Info Updated!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsPosts $newspost)
    {
//        return $newspost;
        if(empty($newspost->post_photo)){
            $newspost->delete();
            Tag::where('post_id',$newspost->id)->delete();
        }else{
            unlink('uploads/'.$newspost->post_photo);
            $newspost->delete();
            Tag::where('post_id',$newspost->id)->delete();
        }
        return redirect()->back()->with('error','NewsPost data deleted!!');
    }

    public function AdminNewsPostTagDelete($id,$id1)
    {
        Tag::findOrFail($id)->delete();
        return redirect()->route('newspost.edit',$id1)->with('error','Tag Info is deleted!!');
    }

}
