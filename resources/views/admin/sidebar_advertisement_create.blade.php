@extends('admin.admin_master')
@section('title','Create Sidebar Advertisement')
@section('heading','Create Sidebar Advertisements')
@section('button')
    <a href="{{ route('sidebar_advertisement_view') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>
@endsection
@section('main_content')
    <div class="section-body">
        <form action="{{ route('sidebar_advertisement_save') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Select Photo</label>
                                <div>
                                    <input type="file" name="sidebar_ad">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>URL</label>
                                <input type="text" class="form-control" name="sidebar_ad_url">
                            </div>
                            <div class="form-group mb-3">
                                <label>Sidebar Ad Location</label>
                                <select name="sidebar_ad_location" class="form-control">
                                    <option value="top">Top</option>
                                    <option value="bottom">Bottom</option>
                                </select>
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
@endsection

