<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">

        @include('layouts.sections.styles')

        <title>@yield('title') | {{ config('maestro.app_name')}}</title>
    </head>

    <body>
        <div class="page_wrapper">
            <div id="preloader">
                <div id="loader"></div>
            </div>

            @if(Route::is('home') )
                @include('layouts.sections.header')
            @endif

            @yield('content')

            @if(Route::is('home') )
                @include('layouts.sections.footer')
            @endif

        </div>

        @include('layouts.sections.scripts')

    </body>
</html>
