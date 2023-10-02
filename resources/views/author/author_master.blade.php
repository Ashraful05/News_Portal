<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>
    @include('author.layout.styles')

    @include('author.layout.scripts')
</head>

<body>
<div id="app">
    <div class="main-wrapper">

        @include('author.layout.nav')



        @include('author.layout.sidebar')

        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>@yield('heading')</h1>
                    <div class="ml-auto">
                        {{--                        <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> Button</a>--}}
                        @yield('button')
                    </div>
                </div>


                @yield('main_content')


            </section>
        </div>

    </div>
</div>

@include('author.layout.scripts_footer')

@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            iziToast.error({
                title: '',
                position:'topRight',
                message: '{{ $error }}',
            });
        </script>
    @endforeach
@endif

@if(session()->has('error'))
    <script>
        iziToast.error({
            title: 'Error',
            position:'topRight',
            message: '{{ session()->get('error') }}',
        });
    </script>
@endif

@if(session()->has('success'))
    <script>
        iziToast.success({
            title: '',
            position:'topRight',
            message:'{{ session()->get('success') }}'
        });
    </script>
@endif



</body>
</html>

