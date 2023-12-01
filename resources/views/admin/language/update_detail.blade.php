@extends('admin.admin_master')
@section('title','Language View')
@section('heading','Language Show')
@section('button')
    <a href="{{ route('language.index') }}" class="btn btn-primary"><i class="fas fa-eye-slash"></i> View</a>
@endsection
@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_language_update_detail_submit',$languageData->id) }}" method="post">
                            @csrf
                            <div class="table-responsive">
                                <table class="table table-bordered" id="">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Key</th>
                                        <th>Value</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($languageJsonData as $key => $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $key }}</td>
                                            <td>
                                                <input type="hidden" name="arr_key[]" value="{{ $key }}" class="form-control">
                                                <input type="text" name="arr_value[]" value="{{ $value }}" class="form-control">
                                            </td>
                                            {{--                                        <td>--}}
                                            {{--                                            <a href="{{ route('admin_language_update_detail',$data->id) }}" class="btn btn-success">Update Details</a>--}}
                                            {{--                                        </td>--}}
                                            {{--                                        <td class="pt_10 pb_10">--}}
                                            {{--                                            <a href="{{ route('language.edit',$data->id) }}" class="btn btn-primary" title="Edit Data"><i class="fas fa-edit"></i></a>--}}

                                            {{--                                            @if($row != 1)--}}
                                            {{--                                                <form action="{{ route('language.destroy',$data->id) }}" method="post">--}}
                                            {{--                                                    @csrf--}}
                                            {{--                                                    @method('delete')--}}
                                            {{--                                                    <button type="submit" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger" title="Delete Data"> <i class="fas fa-trash-alt"></i> </button>--}}
                                            {{--                                                </form>--}}
                                            {{--                                            @endif--}}

                                            {{--                                        </td>--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-success form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



