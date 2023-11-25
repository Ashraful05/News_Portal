@extends('admin.admin_master')

@if($language->exists)
    @section('title','Edit language Data')
@section('heading','Edit language Data')
@else
    @section('title','Create language Data')
@section('heading','Create language Data')
@endif
@section('button')
    <a href="{{ route('language.index') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>
@endsection
@section('main_content')
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <div class="section-body">
        @if($language->exists)
            <form action="{{ route('language.update',$language->id) }}" method="post">
                @method('put')
                @else
                    <form action="{{ route('language.store') }}" method="post">
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="">Language Name</label>
                                            <div>
                                                <input type="text" name="language_name" value="{{ old('language_name',$language->language_name) }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Language Short Name</label>
                                            <div>
                                                <input type="text" name="language_short_name" value="{{ old('language_short_name',$language->language_short_name) }}" class="form-control">
                                            </div>
                                        </div>

                                        @if($language->exists)
                                            <div class="form-group mb-1">
                                                <label for="">Is Default?</label>
                                                <select name="is_default" class="form-control">
                                                    <option value="yes" @if($language->is_default == 'yes') selected @endif>Yes</option>
                                                    <option value="no" @if($language->is_default == 'no') selected @endif>No</option>
                                                </select>
                                            </div>
                                        @else
                                            <div class="form-group mb-1">
                                                <label for="">Is Default?</label>
                                                <select name="is_default" class="form-control">
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($language->exists)
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



