@extends('admin.admin_master')

@if($video->exists)
    @section('title','Edit Video Data')
@section('heading','Edit Video Data')
@else
    @section('title','Create Video Data')
@section('heading','Create Video Data')
@endif
@section('button')
    <a href="{{ route('video.index') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>
@endsection
@section('main_content')
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <div class="section-body">
        @if($video->exists)
            <form action="{{ route('video.update',$video->id) }}" method="post" enctype="multipart/form-data">

                @method('put')
                @else
                    <form action="{{ route('video.store') }}" method="post" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="">Video ID</label>
                                            <div>
                                                <input type="text" name="video_id" value="{{ old('video_id',$video->video_id) }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Caption</label>
                                            <div>
                                                <input type="text" name="caption" value="{{ old('caption',$video->caption) }}" class="form-control">
                                            </div>
                                        </div>
                                        @if($video->exists)
                                            <div class="form-group mb-3">
                                                <label for="">SubCategory Language</label>
                                                <select name="language_id" id="" class="form-control">
                                                    @foreach($global_language_data as $data)
                                                        <option value="{{ $data->id }}" @if($data->id == $video->language_id) selected @endif>{{ $data->language_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @else
                                            <div class="form-group mb-3">
                                                <label for="">SubCategory Language</label>
                                                <select name="language_id" id="" class="form-control">
                                                    <option value="" selected disabled>Select a Language</option>
                                                    @foreach($global_language_data as $data)
                                                        <option value="{{ $data->id }}">{{ $data->language_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($video->exists)
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                            </div>
                        @else
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Create</button>
                            </div>
                        @endif
                    </form>
            </form>
    </div>

    <script>
        $(document).ready(function(){
            $('#post_photo').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection



