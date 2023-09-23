@extends('admin.admin_master')

@if($socialMedia->exists)
    @section('title','Edit Social Media Data')
@section('heading','Edit Social Media Data')
@else
    @section('title','Create socialMedia Data')
@section('heading','Create socialMedia Data')
@endif

@section('button')
    <a href="{{ route('socialMedia.index') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>
@endsection
@section('main_content')
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <div class="section-body">
        @if($socialMedia->exists)
            <form action="{{ route('socialMedia.update',$socialMedia->id) }}" method="post">

                @method('put')
                @else
                    <form action="{{ route('socialMedia.store') }}" method="post">
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="">ICON</label>
                                            <div>
                                                <input type="text" name="icon" class="form-control" value="{{ old('icon',$socialMedia->icon) }}">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">URL</label>
                                            <div>
                                                <input type="text" name="url" class="form-control" value="{{ old('url',$socialMedia->url) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($socialMedia->exists)
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




