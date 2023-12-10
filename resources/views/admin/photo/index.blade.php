@extends('admin.admin_master')
@section('title','Photo View')
@section('heading','Photo Show')
@section('button')
    <a href="{{ route('photo.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                    <th>Photo</th>
                                    <th>Caption</th>
                                    <th>Caption Language</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($photos as $row => $data)
                                    <tr>
                                        <td>{{ ++$row }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/'.$data->photo) }}" style="height: 80px;width: 80px;" alt="">
                                        </td>
                                        <td>{{ $data->caption }}</td>
                                        <td>{{ $data->rLanguage->language_name }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('photo.edit',$data->id) }}" class="btn btn-primary" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('photo.destroy',$data->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger" title="Delete Data"> <i class="fas fa-trash-alt"></i> </button>
                                            </form>
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

