@extends('admin.admin_master')
@section('title','Sidebar Advertisement')
@section('heading','Sidebar Advertisements')
@section('button')
    <a href="{{ route('sidebar_advertisement_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
@endsection
@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Advertisement Photo</th>
                                    <th>Advertisement URL</th>
                                    <th>Advertisement Location</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($allData as $row => $data)
                                <tr>
                                    <td>{{ ++$row }}</td>
                                    <td><img src="{{ asset('uploads/'.$data->sidebar_ad) }}" width="100px;" alt=""></td>
                                    <td>{{ $data->sidebar_ad_url }}</td>
                                    <td>{{ $data->sidebar_ad_location }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('sidebar_advertisement_edit',$data->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('sidebar_advertisement_delete',$data->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

