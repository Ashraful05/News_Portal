@extends('author.author_master')

@section('title','Create News Post')
@section('heading','Create News Post')

@section('button')
    <a href="{{ route('author_post_view') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>
@endsection
@section('main_content')
    {{--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <div class="section-body">

        <form action="{{ route('author_post_save') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Select Sub Category</label>
                                <select name="sub_category_id" class="form-control">
                                    <option value="0" disabled>Select SubCategory</option>
                                    @foreach($subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}">
                                            {{ $subCategory->sub_category_name }}:({{ $subCategory->rCategory->category_name }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="">SubCategory Language</label>
                                <select name="language_id" id="" class="form-control">
                                    @foreach($global_language_data as $data)
                                        <option value="{{ $data->id }}">{{ $data->language_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Post Title</label>
                                <div>
                                    <input type="text" name="post_title" value="{{ old('post_title') }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Post Details</label>
                                <div>
                                    <textarea name="post_detail" id="" cols="30" rows="10" class="form-control snote"> </textarea>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Is Shareable?</label>
                                <select name="is_share" class="form-control">
                                    <option value="1" >Yes</option>
                                    <option value="0" >No</option>
                                </select>
                            </div>


                            <div class="form-group mb-3">
                                <label>Is Comment?</label>
                                <select name="is_comment" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Want to send this to subscribers?</label>
                                <select name="subscriber_send_option" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="">New Tags</label>
                                <input type="text" class="form-control" name="tags">
                            </div>

                            <div class="form-group mb-3">
                                <label>Tags</label>
                                <div>
                                    <input type="text" class="form-control" name="tags">
                                </div>
                            </div>

                            <input type="hidden" name="old_image" value="">
                            <div class="row col-6">
                                <div class="form-group mb-3">
                                    <label for="">Post Photo</label>
                                    <div>
                                        <input type="file" name="post_photo" id="post_photo" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div>
                                        <img id="showImage" class="rounded avatar-lg" style="height: 150px;width: 150px;" src="{{ asset('uploads/no_image.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Create</button>
            </div>
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



