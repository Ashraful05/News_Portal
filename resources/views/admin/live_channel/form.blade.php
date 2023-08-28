@extends('admin.admin_master')

@if($liveChannel->exists)
    @section('title','Edit Channel Data')
@section('heading','Edit Channel Data')
@else
    @section('title','Create Channel Data')
@section('heading','Create Channel Data')
@endif
@section('button')
    <a href="{{ route('liveChannel.index') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>
@endsection
@section('main_content')
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <div class="section-body">
        @if($liveChannel->exists)
            <form action="{{ route('liveChannel.update',$liveChannel->id) }}" method="post">

                @method('put')
                @else
                    <form action="{{ route('liveChannel.store') }}" method="post">
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="">Video ID</label>
                                            <div>
                                                <input type="text" name="video_id" value="{{ old('video_id',$liveChannel->video_id) }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Heading</label>
                                            <div>
                                                <input type="text" name="heading" value="{{ old('heading',$liveChannel->heading) }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($liveChannel->exists)
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

{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('#post_photo').change(function(e){--}}
{{--                var reader = new FileReader();--}}
{{--                reader.onload = function(e){--}}
{{--                    $('#showImage').attr('src',e.target.result);--}}
{{--                }--}}
{{--                reader.readAsDataURL(e.target.files['0']);--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

@endsection



