@extends('admin.admin_master')
@section('title','Mail to Subscriber')
@section('heading','Mail to Subscriber')
@section('button')
    <a href="{{ route('all_subscriber') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View Subscribers</a>
@endsection
@section('main_content')
    <div class="section-body">
        <form action="{{ route('mail_send_to_subscriber') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Subject*</label>
                                <div>
                                    <input type="text" name="subject" class="form-control">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Message*</label>
                                <div>
                                    <textarea type="text" name="message" class="form-control snote"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Send Email</button>
            </div>
        </form>
    </div>
@endsection


