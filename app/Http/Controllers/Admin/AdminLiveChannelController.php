<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LiveChannel;
use Illuminate\Http\Request;

class AdminLiveChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liveChannels = LiveChannel::get();
        return view('admin.live_channel.index',compact('liveChannels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(LiveChannel $liveChannel)
    {
        return view('admin.live_channel.form',compact('liveChannel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'heading'=>'required',
            'video_id'=>'required'
        ]);
        LiveChannel::create([
           'heading'=>$request->heading,
           'video_id'=>$request->video_id
        ]);
        return redirect()->route('liveChannel.index')->with('success','Data saved successfully!!');
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
    public function edit(LiveChannel $liveChannel)
    {
        return view('admin.live_channel.form',compact('liveChannel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LiveChannel $liveChannel)
    {
        $this->validate($request,[
            'heading'=>'required|string',
            'video_id'=>'required'
        ]);
        $liveChannel->update([
            'heading'=>$request->heading,
            'video_id'=>$request->video_id
        ]);
        return redirect()->route('liveChannel.index')->with('success','Data Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LiveChannel $liveChannel)
    {
        $liveChannel->delete();
        return redirect()->route('liveChannel.index')->with('error','Data Deleted');
    }
}
