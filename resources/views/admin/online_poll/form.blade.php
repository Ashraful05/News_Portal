@extends('admin.admin_master')

@if($onlinePoll->exists)
    @section('title','Edit onlinePoll Data')
@section('heading','Edit onlinePoll Data')
@else
    @section('title','Create onlinePoll Data')
@section('heading','Create onlinePoll Data')
@endif
@section('button')
    <a href="{{ route('onlinePoll.index') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>
@endsection
@section('main_content')
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <div class="section-body">
        @if($onlinePoll->exists)
            <form action="{{ route('onlinePoll.update',$onlinePoll->id) }}" method="post">

                @method('put')
                @else
                    <form action="{{ route('onlinePoll.store') }}" method="post">
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="">Question</label>
                                            <div>
                                                <textarea name="question" class="form-control" style="height: 150px;">{{ old('question',$onlinePoll->question) }}</textarea>
                                            </div>
                                        </div>
                                        @if($onlinePoll->exists)
                                            <div class="form-group mb-3">
                                                <label for="">SubCategory Language</label>
                                                <select name="language_id" id="" class="form-control">
                                                    @foreach($global_language_data as $data)
                                                        <option value="{{ $data->id }}" @if($data->id == $onlinePoll->language_id) selected @endif>{{ $data->language_name }}</option>
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
                        @if($onlinePoll->exists)
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




