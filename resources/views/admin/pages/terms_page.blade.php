@extends('admin.admin_master')
@section('title','Edit Terms Page')
@section('heading','Edit Terms Page')
{{--@section('button')--}}
{{--    <a href="{{ route('admin_category_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>--}}
{{--@endsection--}}
@section('main_content')
    <div class="section-body">
        <form action="{{ route('update_terms_page') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Terms Title</label>
                                <div>
                                    <input type="text" name="terms_title" value="{{ value($data->terms_title) }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Terms Details</label>
                                <div>
                                    <textarea name="terms_detail" class="form-control snote" id="" cols="30" rows="10"> {!! $data->terms_detail !!} </textarea>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Show On Menu?</label>
                                <select name="terms_status" class="form-control">
                                    <option value="show" @if($data->terms_status == 'show') selected @endif>Show</option>
                                    <option value="hide" @if($data->terms_status == 'hide') selected @endif>Hide</option>
                                </select>
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
@endsection



