<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>
    @include('admin.layout.styles')

    @include('admin.layout.scripts')
</head>

<body>
<div id="app">
    <div class="main-wrapper">

        @include('admin.layout.nav')



       @include('admin.layout.sidebar')

        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>@yield('heading')</h1>
                    <div class="ml-auto">
{{--                        <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> Button</a>--}}
                    </div>
                </div>


              @yield('main_content')


            </section>
        </div>

    </div>
</div>

@include('admin.layout.scripts_footer')

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
            position:'center',
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
