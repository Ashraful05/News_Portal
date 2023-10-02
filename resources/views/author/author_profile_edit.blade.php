@extends('author.author_master')
@section('title','Edit Author Profile')
@section('heading','Edit Author Profile')
@section('main_content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('author_profile_update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Name *</label>
                                        <input type="text" class="form-control" name="name" value="{{ Auth::guard('author')->user()->name }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Email *</label>
                                        <input type="text" class="form-control" name="email" value="{{ Auth::guard('author')->user()->email }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Retype Password</label>
                                        <input type="password" class="form-control" name="retype_password">
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">Author Image</label>
                                        <div>
                                            <input type="file" id="author_image" class="form-control mt_10" name="photo">
                                        </div>
                                    </div>
                                    <div class="form-group mb-1">
                                        <div>
                                            <img id="showImage" class="rounded avatar-lg" style="height: 100px;width: 100px;"
                                                 src="{{ (!empty(Auth::guard('author')->user()->photo))?asset('author/assets/uploads/'.Auth::guard('author')->user()->photo):url('uploads/no_image.jpg') }}"
                                                 alt="Card image cap">
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label"></label>
                                        <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#author_image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
