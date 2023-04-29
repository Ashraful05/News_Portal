@extends('admin.admin_master')
@section('title','Home Advertisement')
@section('heading','Home Advertisements')
@section('main_content')
    <div class="section-body">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="">Above Search</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Existing Photo</label>
                                <div>
                                    <img src="{{ asset('frontend/assets/uploads/'.$homeAddData->above_search_ad) }}" alt="" style="width: 100%;">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Change Photo</label>
                                <div>
                                    <input type="file" name="above_search_ad">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>URL</label>
                                <input type="text" class="form-control" name="above_search_ad_url" value="{{ $homeAddData->above_search_ad_url }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Status</label>
                                <select name="above_search_ad_status" class="form-control">
                                    <option value="show" @if($homeAddData->above_search_ad_status=='show') selected @endif>Show</option>
                                    <option value="hide" @if($homeAddData->above_search_ad_status=='hide') selected @endif>Hide</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="">Above Footer</h5>
                        </div>
                        <div class="card-body">


                            <div class="form-group mb-3">
                                <label>Existing Photo</label>
                                <div>
                                    <img src="{{ asset('frontend/assets/uploads/'.$homeAddData->above_footer_ad) }}" alt="" style="width: 100%;">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Change Photo</label>
                                <div>
                                    <input type="file" name="above_footer_ad">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>URL</label>
                                <input type="text" class="form-control" name="above_footer_ad_url" value="{{ $homeAddData->above_footer_ad_url }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Status</label>
                                <select name="above_search_ad_status" class="form-control">
                                    <option value="show" @if($homeAddData->above_footer_ad_status == 'show') selected @endif>Show</option>
                                    <option value="hide" @if($homeAddData->above_footer_ad_status == 'hide') selected @endif>Hide</option>
                                </select>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Update</button>
            </div>
        </form>
    </div>
@endsection
