@extends('admin.admin_master')

@if($author->exists)
    @section('title','Edit Author')
@section('heading','Edit Author')
@else
    @section('title','Create Author')
@section('heading','Create Author')
@endif
@section('button')
    <a href="{{ route('author.index') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>
@endsection
@section('main_content')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="section-body">
        @if($author->exists)
            <form action="{{ route('author.update',$author->id) }}" method="post" enctype="multipart/form-data">

                @method('put')
                @else
                    <form action="{{ route('author.store') }}" method="post" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group mb-1">
                                            <label for="">Author Name</label>
                                            <div>
                                                <input type="text" name="name" value="{{ old('name',$author->name) }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group mb-1">
                                            <label for="">Email</label>
                                            <div>
                                                <input type="text" name="email" value="{{ old('email',$author->email) }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group mb-1">
                                            <label for="">Password</label>
                                            <div>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group mb-1">
                                            <label for="">Retype Password</label>
                                            <div>
                                                <input type="password" name="retype_password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group mb-1">
                                            <label for="">Author Image</label>
                                            <div>
                                                <input type="file" name="photo" id="author_image" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group mb-1">
                                            <div>
                                                <img id="showImage" class="rounded avatar-lg" style="height: 100px;width: 100px;"
                                                     src="{{ (!empty($author->photo))?asset('uploads/'.$author->photo):url('uploads/no_image.jpg') }}"
                                                     alt="Card image cap">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($author->exists)
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




