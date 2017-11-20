<!doctype html>
<html lang="en">
    <head>
        @include('partials._head')
    </head>
    <body>
        <div class="container">
        @include('partials._header')

        <div class="main">

        @include('partials._message')
            
        @yield('content')

        </div>

        @include('partials._footer')
        </div>

    </body>
    <!-- Scripts -->
    {!! Html::script('js/jquery.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}

    @yield('script')

</html>
