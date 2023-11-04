@extends('author.author_master')
@section('title','Author Post View')
@section('heading','Author Post Show')
@section('button')
    <a href="{{ route('post_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                    <th>Post Image</th>
                                    <th>Post Title</th>
                                    <th>Post Category</th>
                                    <th>Post SubCategory</th>
                                    <th>Author Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $row => $data)
                                    <tr>
                                        <td>{{ ++$row }}</td>
                                        @if($data->post_photo)
                                            <td>
                                                <img src="{{ asset('uploads/'.$data->post_photo) }}" style="height: 100px;width: 100px;" alt="">
                                            </td>
                                        @else
                                            <td>
                                                <img src="{{ asset('uploads/no_image.jpg') }}" style="height: 100px;width: 100px;" alt="">
                                            </td>
                                        @endif
                                        <td>{{ $data->post_title }}</td>
                                        <td>{{ $data->rSubCategory->rCategory->category_name }}</td>
                                        <td>{{ $data->rSubCategory->sub_category_name }}</td>
                                        <td>
                                            @if($data->author_id != 0)
                                                {{ Auth::guard('author')->user()->name }}
                                            @else
                                                <p class="text-danger">No Author Found!</p>
                                            @endif
                                        </td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('author_post_edit',$data->id) }}" class="btn btn-primary" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('author_post_delete',$data->id) }}" class="btn btn-danger" title="Delete Data" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash-alt"></i></a>

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


