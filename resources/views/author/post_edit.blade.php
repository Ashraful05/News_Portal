@extends('author.author_master')

@section('title','Edit News Post')
@section('heading','Edit News Post')

@section('button')
    <a href="{{ route('author_post_view') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>
@endsection
@section('main_content')
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <div class="section-body">

        <form action="{{ route('author_post_update',$post->id) }}" method="post" enctype="multipart/form-data">
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
                                        <option value="{{ $subCategory->id }}" @if($subCategory->id == $post->sub_category_id) selected @endif>
                                            {{ $subCategory->sub_category_name }}:({{ $subCategory->rCategory->category_name }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Post Title</label>
                                <div>
                                    <input type="text" name="post_title" value="{{ $post->post_title }}" class="form-control">
                                </div>
                            </div>
                            @if($subCategories!=null)
                                <div class="form-group mb-3">
                                    <label for="">SubCategory Language</label>
                                    <select name="language_id" id="" class="form-control">
                                        @foreach($global_language_data as $data)
                                            <option value="{{ $data->id }}" @if($data->id == $post->language_id) selected @endif>{{ $data->language_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <div class="form-group mb-3">
                                    <label for="">SubCategory Language</label>
                                    <select name="language_id" id="" class="form-control">
                                        @foreach($global_language_data as $data)
                                            <option value="{{ $data->id }}">{{ $data->language_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <div class="form-group mb-3">
                                <label>Post Details</label>
                                <div>
                                    <textarea name="post_detail" id="" cols="30" rows="10" class="form-control snote">{!! $post->post_detail !!} </textarea>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Is Shareable?</label>
                                <select name="is_share" class="form-control">
                                    <option value="1" @if($post->is_share == 1) selected @endif>Yes</option>
                                    <option value="0" @if($post->is_share == 0) selected @endif>No</option>
                                </select>
                            </div>


                            <div class="form-group mb-3">
                                <label>Is Comment?</label>
                                <select name="is_comment" class="form-control">
                                    <option value="1" @if($post->is_comment == 1) selected @endif>Yes</option>
                                    <option value="0" @if($post->is_comment == 0) selected @endif>No</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Want to send this to subscribers?</label>
                                <select name="subscriber_send_option" class="form-control">
                                    <option value="1" @if($post->subscriber_send_option == 1) selected @endif>Yes</option>
                                    <option value="0" @if($post->subscriber_send_option == 0) selected @endif>No</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Existing Tags</label>
                                <table class="table table-bordered">
                                    @foreach($existing_tags as $tag)
                                        <tr>
                                            <td>{{ $tag->tag_name }}</td>
                                            <td>
                                                <a href="{{ route('author_post_delete_tag', [$tag->id,$post->id]) }}" onClick="return confirm('Are you sure?');">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>

                            <div class="form-group mb-3">
                                <label>New Tags</label>
                                <div>
                                    <input type="text" class="form-control" name="tags">
                                </div>
                            </div>

                            <input type="hidden" name="old_image" value="">
                            <div class="row col-6">
                                <div class="form-group mb-3">
                                    <label for="">Post Photo</label>
                                    <div>
                                        <input type="file" name="post_photo" id="post_photo"  class="form-control">
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div>
                                        <img id="showImage" class="rounded avatar-lg" style="height: 150px;width: 150px;" src="{{ asset('uploads/'.$post->post_photo) }} "  alt="Card image cap">
                                    </div>
                                </div>
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




