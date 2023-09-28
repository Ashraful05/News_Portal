@extends('admin.admin_master')
@section('title','Author View')
@section('heading','Author Show')
@section('button')
    <a href="{{ route('author.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                    <th>Author Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($authors as $row => $data)
                                    <tr>
                                        <td>{{ ++$row }}</td>
                                        @if($data->photo)
                                            <td>
                                                <img src="{{ asset('author/assets/uploads/'.$data->photo) }}" style="height: 100px;width: 100px;" alt="">
                                            </td>
                                        @else
                                            <td>
                                                <img src="{{ asset('uploads/no_image.jpg') }}" style="height: 100px;width: 100px;" alt="">
                                            </td>
                                        @endif
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
{{--                                        <td>--}}
{{--                                            @if($data->author_id != 0)--}}

{{--                                            @else--}}
{{--                                                <p class="text-danger">No Author Found!</p>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if($data->admin_id != 0)--}}
{{--                                                {{ Auth::guard('admin')->user()->name }}--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('author.edit',$data->id) }}" class="btn btn-primary" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('author.destroy',$data->id) }}" method="post">
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


