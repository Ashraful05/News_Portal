<?php

namespace App\Http\Controllers\front;

use app\Helper\Helpers;
use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Admin;
use App\Models\Author;
use App\Models\Faq;
use App\Models\OnlinePoll;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FrontPageController extends Controller
{
    public function aboutPage()
    {
        Helpers::read_json();
        $pageData = Page::where('id',1)->first();
        return view('frontend.about',compact('pageData'));
    }
    public function faqPage()
    {
        Helpers::read_json();
        $pageData = Page::where('id',1)->first();
        $faqData = Faq::get();
        return view('frontend.faq',compact('pageData','faqData'));
    }
    public function termsPage()
    {
        Helpers::read_json();
        $pageData = Page::where('id',1)->first();
        return view('frontend.terms',compact('pageData'));
    }
    public function privacyPage()
    {
        Helpers::read_json();
        $pageData = Page::where('id',1)->first();
        return view('frontend.privacy',compact('pageData'));
    }
    public function disclaimerPage()
    {
        Helpers::read_json();
        $pageData = Page::where('id',1)->first();
        return view('frontend.disclaimer',compact('pageData'));
    }
    public function loginPage()
    {
        Helpers::read_json();
        $pageData = Page::where('id',1)->first();
        return view('frontend.login',compact('pageData'));
    }
    public function loginSubmit(Request $request)
    {
        Helpers::read_json();
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $credentials = [
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if(Auth::guard('author')->attempt($credentials)){
            return redirect()->route('author_home');
        }else{
            return redirect()->route('front_login')->with('error','Invalid Credentials');
        }
    }
    public function authorHome()
    {
        Helpers::read_json();
        return view('author.home');
    }
    public function authorProfileEdit()
    {
        Helpers::read_json();
        return view('author.author_profile_edit');
    }
    public function authorProfileUpdate(Request $request)
    {
        Helpers::read_json();
        $authorData = Author::where('email',Auth::guard('author')->user()->email)->first();

        $request->validate([
            'name'=>'required',
            'email'=>[
                'required',
                'email',
                Rule::unique('authors')->ignore($authorData->id)
            ]
        ]);
        if($request->password || $request->retype_password != ''){
            $request->validate([
                'password'=>'required',
                'retype_password'=>'required|same:password'
            ]);
            $authorData->password = Hash::make($request->password);
        }
        if($request->hasFile('photo')){
            $request->validate([
                'photo'=>'image|mimes:jpg,jpeg,png,gif'
            ]);
            if($authorData->photo != ''){
                unlink(public_path('author/assets/uploads/'.$authorData->photo));
            }
            $now = time();
            $ext = $request->file('photo')->extension();
            $finalName = 'author_'.$now.'.'.$ext;
            $request->file('photo')->move(public_path('author/assets/uploads/'),$finalName);
            $authorData->photo = $finalName;
        }

        $authorData->name = $request->name;
        $authorData->email = $request->email;
        $authorData->update();

        return redirect()->back()->with('success','Profile Info Updated!!');
    }
    public function AuthorLogout()
    {
        Helpers::read_json();
        Auth::guard('author')->logout();
        return redirect()->route('front_login');
    }
    public function contactPage()
    {
        Helpers::read_json();
        $pageData = Page::where('id',1)->first();
        return view('frontend.contact',compact('pageData'));
    }
    public function contactEmailSubmit(Request $request)
    {
        Helpers::read_json();
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);
        if(!$validator->passes())
        {
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        }else{
            $adminData = Admin::where('id',1)->first();
            $subject = 'Contact Form Email';
            $message = 'Visitor Message Detail:<br>';
            $message .= '<b>Visitor Name: </b>'.$request->name.'<br>';
            $message .= '<b>Visitor Email: </b>'.$request->email.'<br>';
            $message .= '<b>Visitor Message: </b>'.$request->message.'<br>';
            Mail::to($adminData->email)->send(new Websitemail($subject,$message));
            return response()->json(['code'=>1,'success_message'=>'Email is Sent!!']);
        }
    }
    public function onlinePollSubmit(Request $request,$id)
    {
        Helpers::read_json();
        $onlinePollVote = OnlinePoll::where('id',$request->id)->first();
        if($request->vote == 'yes')
        {
            $onlinePollVote->yes_vote += 1;
            $onlinePollVote->update();
        }else if($request->vote == 'no')
        {
            $onlinePollVote->no_vote  += 1;
            $onlinePollVote->update();
        }
        else{
            return redirect()->back()->with('error','Plese give your vote');
        }
        Session::put('current_poll_id',$onlinePollVote->id);
        return redirect()->back()->with('success','Vote is counted Successfully!');

    }

    public function onlinePollPreviousResult()
    {
        Helpers::read_json();
        $onlinePollData = OnlinePoll::orderby('id','desc')->get();
        return view('frontend.previous_poll_result',compact('onlinePollData'));
    }
    public function ForgetPassword()
    {
        Helpers::read_json();
        return view('frontend.forget_password');
    }
    public function ForgetPasswordSubmit(Request $request)
    {
        Helpers::read_json();
        $request->validate([
            'email'=>'required|email'
        ]);
        $data = Author::where('email',$request->email)->first();
        if(!$data){
            return redirect()->route('forget_password')->with('error','Email not found!');
        }
        $token = hash('sha256',time());
        $data->token = $token;
        $data->update();
        $reset_password_link = url('reset-password/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = 'Please click on the following link: <br>';
        $message .= '<a href="'.$reset_password_link.'">Click Here</a>';

        Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->route('front_login')->with('success','Please check your email and follow the steps there');
    }
    public function ResetPassword($token,$email)
    {
        Helpers::read_json();
        $data = Author::where(['token'=>$token,'email'=>$email])->first();
        if(!$data){
            return redirect()->route('front_login');
        }
        return view('frontend.reset_password',compact('token','email'));
    }
    public function ResetPasswordSubmit(Request $request)
    {
        Helpers::read_json();
        $request->validate([
            'password'=>'required',
            'retype_password' =>'required|same:password'
        ]);
        $data = Author::where(['token'=>$request->token,'email'=>$request->email])->first();
        $data->password = Hash::make($request->password);
        $data->token = '';
        $data->update();
        return redirect()->route('front_login')->with('success','Password is successfully reset');
    }


}
