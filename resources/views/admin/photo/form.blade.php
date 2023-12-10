@extends('admin.admin_master')

@if($photo->exists)
    @section('title','Edit Photo Data')
@section('heading','Edit Photo Data')
@else
    @section('title','Create Photo Data')
@section('heading','Create Photo Data')
@endif
@section('button')
    <a href="{{ route('photo.index') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>
@endsection
@section('main_content')
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <div class="section-body">
        @if($photo->exists)
            <form action="{{ route('photo.update',$photo->id) }}" method="post" enctype="multipart/form-data">

                @method('put')
                @else
                    <form action="{{ route('photo.store') }}" method="post" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                            <div class="form-group mb-3">
                                                <label for="">Caption</label>
                                                <div>
                                                    <input type="text" name="caption" value="{{ old('caption',$photo->caption) }}" class="form-control">
                                                </div>
                                            </div>
                                        @if($photo->exists)
                                            <div class="form-group mb-3">
                                                <label for="">Caption Language</label>
                                                <select name="language_id" id="" class="form-control">
                                                    @foreach($global_language_data as $data)
                                                        <option value="{{ $data->id }}" @if($data->id == $photo->language_id) selected @endif>{{ $data->language_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @else
                                            <div class="form-group mb-3">
                                                <label for="">Caption Language</label>
                                                <select name="language_id" id="" class="form-control">
                                                    <option value="" selected disabled>Select a Language</option>
                                                    @foreach($global_language_data as $data)
                                                        <option value="{{ $data->id }}">{{ $data->language_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        <input type="hidden" name="old_image" value="{{ $photo->photo }}">
                                            <div class="form-group mb-3">
                                                <label for="">Photo</label>
                                                <div>
                                                    <input type="file" name="photo" id="post_photo" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group mb-1">
                                                <div>
                                                    <img id="showImage" class="rounded avatar-lg" style="height: 150px;width: 150px;"
                                                         src="{{ (!empty($photo->photo))?asset('uploads/'.$photo->photo):url('uploads/no_image.jpg') }}"
                                                         alt="Card image cap">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($photo->exists)
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



