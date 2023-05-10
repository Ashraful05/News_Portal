@extends('admin.admin_master')
@section('title','Edit Category')
@section('heading','Edit Category')
@section('button')
    <a href="{{ route('admin_category_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>
@endsection
@section('main_content')
    <div class="section-body">
        <form action="{{ route('admin_category_update',$category->id) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Category Name</label>
                                <div>
                                    <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Show On Menu?</label>
                                <select name="show_on_menu" class="form-control">
                                    <option value="show" @if($category->show_on_menu == 'show') selected @endif>Show</option>
                                    <option value="hide" @if($category->show_on_menu == 'hide') selected @endif>Hide</option>
                                </select>
                            </div>
                            <div class="form-group mb-1">
                                <label>Category Order</label>
                                <div>
                                    <input type="text" name="category_order" value="{{ $category->category_order }}" class="form-control">
                                </div>
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


