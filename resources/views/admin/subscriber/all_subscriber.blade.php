@extends('admin.admin_master')
@section('title','Subscriber View')
@section('heading','Subscriber Show')

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
                                    <th>Subscriber Email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subscribers as $row => $data)
                                    <tr>
                                        <td>{{ ++$row }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td class="pt_10 pb_10">
{{--                                            <a href="{{ route('admin_category_edit',$data->id) }}" class="btn btn-primary">Edit</a>--}}
{{--                                            <a href="{{ route('admin_category_delete',$data->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>--}}
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

