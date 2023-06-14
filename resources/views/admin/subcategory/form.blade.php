@extends('admin.admin_master')

@if($subcategory->exists)
    @section('title','Edit SubCategory')
    @section('heading','Edit SubCategory')
@else
    @section('title','Create SubCategory')
    @section('heading','Create SubCategory')
@endif
@section('button')
    <a href="{{ route('subcategory.index') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>
@endsection
@section('main_content')
    <div class="section-body">
        @if($subcategory->exists)
            <form action="{{ route('subcategory.update',$subcategory->id) }}" method="post">
                @method('put')
                @else
                    <form action="{{ route('subcategory.store') }}" method="post">
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label>Category</label>
                                            <select name="category_id" class="form-control">
                                                <option value="0"{{ $subcategory->exists? '' : 'selected' }} disabled>Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" @if($category->id == $subcategory->category_id) selected @endif>
                                                        {{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>SubCategory Name</label>
                                            <div>
                                                <input type="text" name="sub_category_name" value="{{ old('sub_category_name',$subcategory->sub_category_name) }}" class="form-control">
                                            </div>
                                        </div>
                                        @if($subcategory->exists)
                                            <div class="form-group mb-3">
                                                <label>Show On Menu?</label>
                                                <select name="show_on_menu" class="form-control">
                                                    <option value="show" @if($subcategory->show_on_menu=='show') selected @endif>Show</option>
                                                    <option value="hide" @if($subcategory->show_on_menu=='hide')  selected @endif>Hide</option>
                                                </select>
                                            </div>
                                        @else
                                            <div class="form-group mb-3">
                                                <label>Show On Menu?</label>
                                                <select name="show_on_menu" class="form-control">
                                                    <option value="show">Show</option>
                                                    <option value="hide">Hide</option>
                                                </select>
                                            </div>
                                        @endif
                                        @if($subcategory->exists)
                                            <div class="form-group mb-3">
                                                <label>Show On Home Page?</label>
                                                <select name="show_on_home_page" class="form-control">
                                                    <option value="show" @if($subcategory->show_on_home_page=='show') selected @endif>Show</option>
                                                    <option value="hide" @if($subcategory->show_on_home_page=='hide')  selected @endif>Hide</option>
                                                </select>
                                            </div>
                                        @else
                                            <div class="form-group mb-3">
                                                <label>Show On Home Page?</label>
                                                <select name="show_on_home_page" class="form-control">
                                                    <option value="show">Show</option>
                                                    <option value="hide">Hide</option>
                                                </select>
                                            </div>
                                        @endif

                                        <div class="form-group mb-1">
                                            <label>SubCategory Order</label>
                                            <div>
                                                <input type="text" name="sub_category_order" value="{{ old('sub_category_order',$subcategory->sub_category_order) }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($subcategory->exists)
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                            </div>
                        @else
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Create</button>
                            </div>
                        @endif
                    </form>
            </form>
    </div>
@endsection

