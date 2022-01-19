<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
    </head>
    <body>
        <div id="page-container">
            <div id="content-wrap">
                @include('includes.navbar')
                <div class="container">
                    @yield('content')
                </div>
            </div>
            @include('includes.footer')
        </div>
    </body>
    @yield('scripts')
</html>