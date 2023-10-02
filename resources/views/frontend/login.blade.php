@extends('frontend.frontend_master')
@section('title','Login')
@section('main_content')
    <div class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $pageData->login_title }}</h2>
                    <nav class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front_home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $pageData->login_title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('author_login') }}" method="post">
                        @csrf
                        <div class="login-form">
                            <div class="mb-3">
                                <label for="" class="form-label">Email Address</label>
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

