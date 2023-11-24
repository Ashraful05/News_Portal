@extends('admin.admin_master')
@section('title','Settings')
@section('heading','Settings')
{{--@section('button')--}}
{{--    <a href="{{ route('admin_category_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>--}}
{{--@endsection--}}
@section('main_content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_setting_update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="v-1-tab" data-toggle="pill" href="#v-1" role="tab" aria-controls="v-1" aria-selected="true">
                                            Home Page
                                        </a>
                                        <a class="nav-link" id="v-2-tab" data-toggle="pill" href="#v-2" role="tab" aria-controls="v-2" aria-selected="false">
                                            Text Item
                                        </a>
                                        <a class="nav-link" id="v-3-tab" data-toggle="pill" href="#v-3" role="tab" aria-controls="v-3" aria-selected="false">
                                            Top Bar
                                        </a>
                                        <a class="nav-link" id="v-4-tab" data-toggle="pill" href="#v-4" role="tab" aria-controls="v-4" aria-selected="false">
                                            Theme Color
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="pt_0 tab-pane fade show active" id="v-1" role="tabpanel" aria-labelledby="v-1-tab">
                                            <!-- Home Page Start -->
                                            <div class="form-group mb-3">
                                                <label>News Ticker Total *</label>
                                                <input type="text" class="form-control" name="news_ticker_total" value="{{ $setting->news_ticker_total }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>News Ticker Status</label>
                                                <select name="news_ticker_status" class="form-control">
                                                    <option value="show" @if($setting->news_ticker_status == 'show') selected @endif>Show</option>
                                                    <option value="hide" @if($setting->news_ticker_status == 'hide') selected @endif>Hide</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Video Item Total *</label>
                                                <input type="text" class="form-control" name="video_total" value="{{ $setting->video_total }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Video Item Status</label>
                                                <select name="video_status" class="form-control">
                                                    <option value="show" @if($setting->video_status == 'show') selected @endif>Show</option>
                                                    <option value="hide" @if($setting->video_status == 'hide') selected @endif>Hide</option>
                                                </select>
                                            </div>
                                            <!-- Home Page End -->
                                        </div>

                                        <div class="pt_0 tab-pane fade" id="v-2" role="tabpanel" aria-labelledby="v-2-tab">
                                            <div class="form-group mb-1">
                                                <label for="">Existing Logo</label>
                                                <img id="showImage" class="rounded avatar-lg" style="height: 100px;width: 100px;"
                                                     src="{{ (!empty($setting->logo))?asset('uploads/'.$setting->logo):url('uploads/no_image.jpg') }}"
                                                     alt="Card image cap">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label>Change Logo</label>
                                                <input type="file" name="logo" id="logo" class="form-control">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="">Existing Favicon</label>
                                                <img id="showFavIcon" class="rounded avatar-lg" style="height: 50px;width: 50px;"
                                                     src="{{ (!empty($setting->favicon))?asset('uploads/'.$setting->favicon):url('uploads/no_image.jpg') }}"
                                                     alt="Card image cap">
                                            </div>
                                            <div class="form-group mb-1">
                                                <label>Change Favicon</label>
                                                <input type="file" name="favicon" id="favicon" class="form-control">
                                            </div>

                                            <!-- Text Item End -->
                                        </div>

                                        <div class="pt_0 tab-pane fade" id="v-3" role="tabpanel" aria-labelledby="v-3-tab">

                                            <div class="form-group mb-1">
                                                <label>Date Status</label>
                                                <select name="top_bar_date_status" class="form-control">
                                                    <option value="show" @if($setting->top_bar_date_status == 'show') selected @endif>Show</option>
                                                    <option value="hide" @if($setting->top_bar_date_status == 'hide') selected @endif>Hide</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-1">
                                                <label>Email Address</label>
                                                <input type="email" name="top_bar_email" id="top_bar_email" value="{{ old('top_bar_email',$setting->top_bar_email) }}" class="form-control">
                                            </div>
                                            <div class="form-group mb-1">
                                                <label>Email Status</label>
                                                <select name="top_bar_email_status" id="" class="form-control">
                                                    <option value="show" @if($setting->top_bar_email_status == 'show') selected @endif>Show</option>
                                                    <option value="hide" @if($setting->top_bar_email_status == 'hide') selected @endif>Hide</option>
                                                </select>
                                            </div>
                                            <!-- Top Bar End -->
                                        </div>
                                        <div class="pt_0 tab-pane fade" id="v-4" role="tabpanel" aria-labelledby="v-4-tab">

                                            <div class="form-group mb-1">
                                                <label>Theme Color 1</label>
                                                <input type="text" class="form-control jscolor" name="theme_color_1" value="{{ $setting->theme_color_1 }}">
                                            </div>
                                            <div class="form-group mb-1">
                                                <label>Theme Color 2</label>
                                                <input type="text" class="form-control jscolor" name="theme_color_2" value="{{ $setting->theme_color_2 }}">
                                            </div>
                                            <!-- Top Bar End -->
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt_30">
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $('#logo').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

        $(document).ready(function(){
            $('#favicon').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showFavIcon').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection


