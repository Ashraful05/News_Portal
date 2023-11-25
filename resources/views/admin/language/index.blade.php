@extends('admin.admin_master')
@section('title','Language View')
@section('heading','Language Show')
@section('button')
    <a href="{{ route('language.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                    <th>Language Name</th>
                                    <th>Language Short Name</th>
                                    <th>Is Default?</th>
                                    <th>Update Detail</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($languageData as $row => $data)
                                    <tr>
                                        <td>{{ ++$row }}</td>
{{--                                        <td>{{ $loop->iteration }}</td>--}}
                                        <td>{{ $data->language_name }}</td>
                                        <td>{{ $data->language_short_name }}</td>
                                        <td>{{ $data->is_default }}</td>
                                        <td>
                                            <a href="" class="btn btn-success">Update Details</a>
                                        </td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('language.edit',$data->id) }}" class="btn btn-primary" title="Edit Data"><i class="fas fa-edit"></i></a>

                                            @if($row != 1)
                                                <form action="{{ route('language.destroy',$data->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger" title="Delete Data"> <i class="fas fa-trash-alt"></i> </button>
                                                </form>
                                            @endif

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



