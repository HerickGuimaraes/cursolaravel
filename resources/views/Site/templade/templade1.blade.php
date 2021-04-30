<!DOCTYPE html>
<html>
    <head>
    <title>{{$title}}</title>

    </head>
    <body>

     @yield('content')

     @stack('scripts')
    </body>


</html>
