<?php

namespace App\Http\Controllers\author;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
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
    public function postView()
    {
        $posts = NewsPosts::with('rSubCategory')->where('author_id',Auth::guard('author')->user()->id)->get();
        return view('author.post_show',compact('posts'));
    }
    public function postCreate()
    {
        $subCategories = SubCategory::with('rCategory')->get();
        return view('author.post_create',compact('subCategories'));
    }
    public function savePost(Request $request)
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
        $finalName = 'author_news_post_'.time().'.'.$ext;
//        $request->file('post_photo')->move(public_path('uploads/'),$finalName);
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

        return redirect()->route('author_post_view')->with('success','Author Post Info Saved Successfully!');
    }
    public function editPost($id)
    {
        $test = NewsPosts::where('id',$id)->where('author_id',Auth::guard('author')->user()->id)->count();
        if(!$test){
            return redirect()->route('author_post_view');
        }
        $post = NewsPosts::findOrFail($id);
        $subCategories = SubCategory::with('rCategory')->get();
//        return $subCategories;
        $existing_tags = Tag::where('post_id',$post->id)->get();
        return view('author.post_edit',compact('post','subCategories','existing_tags'));
    }

    public function updatePost(Request $request,$id)
    {
        $oldImage = $request->old_image;
        $newspost = NewsPosts::findOrFail($id);
        if($request->hasFile('post_photo')){
            if(!empty($oldImage)){
                unlink(public_path('uploads/'.$newspost->post_photo));
            }
            $request->validate([
                'post_photo'=>'required|image|mimes:jpg,jpeg,png,gif,webp'
            ]);

            $ext = $request->file('post_photo')->extension();
            $finalName = 'author_news_post_'.time().'.'.$ext;
            $request->file('post_photo')->move(public_path('uploads/'),$finalName);
            $newspost->post_photo=$finalName;
            $newspost->update([
                'post_photo'=>$finalName,
                'sub_category_id'=>$request->sub_category_id,
                'post_title'=>$request->post_title,
                'post_detail'=>$request->post_detail,
                'is_share'=>$request->is_share,
                'is_comment'=>$request->is_comment,
                'language_id'=>$request->language_id
            ]);
        }else{
            $newspost->update([
                'sub_category_id'=>$request->sub_category_id,
                'post_title'=>$request->post_title,
                'post_detail'=>$request->post_detail,
//                'visitors'=>1,
//                'author_id'=>0,
//                'admin_id'=>Auth::guard('admin')->user()->id,
                'is_share'=>$request->is_share,
                'is_comment'=>$request->is_comment,
                'language_id'=>$request->language_id
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

        return redirect()->route('author_post_view')->with('success','Post Info Updated!!!');
    }
    public function deletePost($id)
    {
        $newspost = NewsPosts::findOrFail($id);
        $permission = NewsPosts::where(['id'=>$newspost->id,'author_id'=>Auth::guard('author')->user()->id])->count();
        if(!$permission){
            return redirect()->route('admin_home')->with('error','You can not delete auhtor post');
        }
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
    public function AuthorNewsPostTagDelete($id,$id1)
    {
        Tag::findOrFail($id)->delete();
        return redirect()->route('author_post_edit',$id1)->with('error','Tag Info is deleted!!');
    }




}
