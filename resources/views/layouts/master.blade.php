<html>
    <head>
        <title>@yield('title','TODO app')</title>
        @section('styles')
            <link rel="stylesheet" type="text/css" href="{{\Illuminate\Support\Facades\URL::asset('app.css')}}">
        @show
    </head>

    <body>
        <div class="container">
            @yield('content')
        </div>
        @section('scripts')

        @show
    </body>
</html>
