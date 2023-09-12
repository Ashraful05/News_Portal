<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OnlinePoll;
use Illuminate\Http\Request;

class AdminOnlinePollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polls = OnlinePoll::orderby('id','desc')->get();
        return view('admin.online_poll.index',compact('polls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(OnlinePoll $onlinePoll)
    {
        return view('admin.online_poll.form',compact('onlinePoll'));
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
           'question'=>'required'
        ]);
        OnlinePoll::create([
           'question'=>$request->question,
            'yes_vote'=>0,
            'no_vote'=>0
        ]);
        return redirect()->route('onlinePoll.index')->with('success','Data Saved Successfully!');
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
    public function edit(OnlinePoll $onlinePoll)
    {
        return view('admin.online_poll.form',compact('onlinePoll'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OnlinePoll $onlinePoll)
    {
        $request->validate(['question']);
        $onlinePoll->update([
           'question'=>$request->question
        ]);
        return redirect()->route('onlinePoll.index')->with('success','Data Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OnlinePoll $onlinePoll)
    {
        $onlinePoll->delete();
        return redirect()->route('onlinePoll.index')->with('error','Data Deleted!!');
    }
}
