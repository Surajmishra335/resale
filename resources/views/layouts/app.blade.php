<!DOCTYPE html>
<html lang="en">

<head>
  @include('layouts.inc.head')

</head>

<body>
  
    @include('layouts.inc.header')
    <div id="app" style="padding: 0px; margin: 0px">
    @yield('content')
    </div>

    @include('layouts.inc.footer')
  
</body>

</html>