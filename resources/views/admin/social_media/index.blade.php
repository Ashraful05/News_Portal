@extends('admin.admin_master')
@section('title','Social Media View')
@section('heading','Social Media Show')
@section('button')
    <a href="{{ route('socialMedia.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                    <th>ICON</th>
                                    <th>Preview</th>
                                    <th>URL</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $row => $item)
                                    <tr>
                                        <td>{{ ++$row }}</td>
                                        <td>{{ $item->icon }}</td>
                                        <td>
                                            <i class="{{$item->icon}}"></i>
                                        </td>
                                        <td>{{ $item->url }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('socialMedia.edit',$item->id) }}" class="btn btn-primary" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('socialMedia.destroy',$item->id) }}" method="post">
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



