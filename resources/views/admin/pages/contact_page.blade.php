@extends('admin.admin_master')
@section('title','Edit Contact Page')
@section('heading','Edit Contact Page')
{{--@section('button')--}}
{{--    <a href="{{ route('admin_category_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>--}}
{{--@endsection--}}
@section('main_content')
    <div class="section-body">
        <form action="{{ route('update_contact_page') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Contact Title</label>
                                <div>
                                    <input type="text" name="contact_title" value="{{ value($data->contact_title) }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Contact Details</label>
                                <div>
                                    <textarea name="contact_detail" class="form-control snote" id="" cols="30" rows="10"> {!! $data->contact_detail !!} </textarea>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Contact Map(IFRAME Code)</label>
                                <div>
                                    <textarea name="contact_map" class="form-control" id="" cols="30" rows="10" style="height: 120px;"> {!! $data->contact_map !!} </textarea>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Show On Menu?</label>
                                <select name="contact_status" class="form-control">
                                    <option value="show" @if($data->contact_status == 'show') selected @endif>Show</option>
                                    <option value="hide" @if($data->contact_status == 'hide') selected @endif>Hide</option>
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



