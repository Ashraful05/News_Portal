@extends('admin.admin_master')
@section('title','FAQ View')
@section('heading','FAQ Show')
@section('button')
    <a href="{{ route('faq.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                    <th>FAQ Title</th>
                                    <th>FAQ Language</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($faqData as $row => $data)
                                    <tr>
                                        <td>{{ ++$row }}</td>
                                        <td>{{ $data->faq_title }}</td>
                                        <td>{{ $data->rLanguage->language_name }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('faq.edit',$data->id) }}" class="btn btn-primary" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('faq.destroy',$data->id) }}" method="post">
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


