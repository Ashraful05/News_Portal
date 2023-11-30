<?php

namespace App\Http\Controllers\front;

use app\Helper\Helpers;
use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    public function index(Request $request)
    {
        Helpers::read_json();
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        }
        else{
            $token = hash('sha256',time());
            Subscriber::create([
                'email'=>$request->email,
                'status'=>'pending',
                'token'=>$token
            ]);

            $subject = 'Subscriber Email Verify';
            $verification_link = url('subscriber/verify/'.$token.'/'.$request->email);
            $message = 'Please click on the following link to verify as subscriber:<br>';
            $message .= '<a href="'.$verification_link.'">';
            $message .= $verification_link;
            $message .= '</a>';
            Mail::to($request->email)->send(new Websitemail($subject,$message));
            return response()->json(['code'=>1,'success_message'=>'Please check your email address to verify as subscriber !!']);
        }
    }
    public function SubscriberVerification($token,$email)
    {
        Helpers::read_json();
        $data = Subscriber::where(['token'=>$token,'email'=>$email])->first();
        if($data){
//            echo 'ok';
            $data->token = '';
            $data->status = 'active';
            $data->update();
            return redirect()->back()->with('success_message','You are successfully verified as a subscriber to this system!!');
        }else{
            return redirect()->route('front_home');
        }
    }
}
