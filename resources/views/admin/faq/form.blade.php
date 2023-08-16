@extends('admin.admin_master')

@if($faq->exists)
    @section('title','Edit faq Data')
@section('heading','Edit faq Data')
@else
    @section('title','Create faq Data')
@section('heading','Create faq Data')
@endif
@section('button')
    <a href="{{ route('faq.index') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>
@endsection
@section('main_content')
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <div class="section-body">
        @if($faq->exists)
            <form action="{{ route('faq.update',$faq->id) }}" method="post">

                @method('put')
                @else
                    <form action="{{ route('faq.store') }}" method="post">
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="">FAQ Title</label>
                                            <div>
                                                <input type="text" name="faq_title" value="{{ old('faq_title',$faq->faq_title) }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">FAQ Detail</label>
                                            <div>
                                                <textarea name="faq_detail" class="form-control snote">{{ old('faq_detail',$faq->faq_detail) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($faq->exists)
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



