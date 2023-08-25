<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminSubscriberController extends Controller
{
    public function allSubscriber()
    {
        $subscribers = Subscriber::where('status','active')->get();
        return view('admin.subscriber.all_subscriber',compact('subscribers'));
    }
    public function mailToSubscriber()
    {
        return view('admin.subscriber.mail_to_subscriber');
    }
    public function mailSendToSubscriber(Request $request)
    {
        $request->validate([
            'subject'=>'required',
            'message'=>'required'
        ]);
        $subject = $request->subject;
        $message = $request->message;
        $subscribers = Subscriber::where('status','active')->get();
        foreach ($subscribers as $subscriber){
            Mail::to($subscriber->email)->send(new Websitemail($subject,$message));
        }
        return redirect()->route('all_subscriber')->with('success','Mail send to Subscriber!!');

    }



}
