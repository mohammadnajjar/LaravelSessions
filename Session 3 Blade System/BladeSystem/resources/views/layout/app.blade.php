<html>
    <head>
      @include("layout.head")
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
        <footer>
            @yield('footer')
        </footer>
        @include("layout.script")
    </body>
</html>