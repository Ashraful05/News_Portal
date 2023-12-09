@extends('admin.admin_master')
@section('title','Live Channels View')
@section('heading','Live Channels Show')
@section('button')
    <a href="{{ route('liveChannel.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                    <th>Heading</th>
                                    <th>Language</th>
                                    <th>Video</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($liveChannels as $row => $data)
                                    <tr>
                                        <td>{{ ++$row }}</td>
                                        <td>{{ $data->heading }}</td>
                                        <td>{{ $data->rLanguage->language_name }}</td>
                                        <td>
                                            <iframe style="width: 300px; height: 220px;" width="560" height="315"
                                                    src="https://www.youtube.com/embed/{{ $data['video_id'] }}"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media;
                                                    gyroscope; picture-in-picture; web-share" allowfullscreen>
                                            </iframe>
                                        </td>

                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('liveChannel.edit',$data->id) }}" class="btn btn-primary" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('liveChannel.destroy',$data->id) }}" method="post">
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



