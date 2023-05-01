@extends('admin.admin_master')
@section('title','Top Advertisement')
@section('heading','Top Advertisements')
@section('main_content')
    <div class="section-body">
        <form action="{{ route('top_advertisement_update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="">Top Add Section</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Existing Photo</label>
                                <div>
                                    <img src="{{ asset('frontend/assets/uploads/'.$topAddData->top_search_ad) }}" alt="" style="width: 100%;">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Change Photo</label>
                                <div>
                                    <input type="file" name="top_search_ad">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>URL</label>
                                <input type="text" class="form-control" name="top_search_ad_url" value="{{ $topAddData->top_search_ad_url }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Status</label>
                                <select name="top_search_ad_status" class="form-control">
                                    <option value="show" @if($topAddData->top_search_ad_status=='show') selected @endif>Show</option>
                                    <option value="hide" @if($topAddData->top_search_ad_status=='hide') selected @endif>Hide</option>
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
