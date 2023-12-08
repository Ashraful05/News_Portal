@extends('admin.admin_master')
@section('title','SubCategory View')
@section('heading','SubCategory Show')
@section('button')
    <a href="{{ route('subcategory.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                    <th>Category Name</th>
                                    <th>SubCategory Name</th>
                                    <th>Language Name</th>
                                    <th>SubCategory Order</th>
                                    <th>Show On Menu</th>
                                    <th>Show On Home Page</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subCategories as $row => $data)
                                    <tr>
                                        <td>{{ ++$row }}</td>
                                        <td>{{ $data->rCategory->category_name }}</td>
                                        <td>{{ $data->sub_category_name }}</td>
                                        <td>{{ $data->rCategory->rLanguage->language_name }}</td>
                                        <td>{{ $data->sub_category_order }}</td>
                                        <td>{{ $data->show_on_menu }}</td>
                                        <td>{{ $data->show_on_home_page }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('subcategory.edit',$data->id) }}" class="btn btn-primary" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('subcategory.destroy',$data->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger" title="Delete Data"> <i class="fas fa-trash-alt"></i> </button>
{{--                                                <a href="#" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>--}}
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

