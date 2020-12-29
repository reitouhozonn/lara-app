<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>react</title>
     <!-- <script src="http://localhost:8097"></script> -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <h1 class="py-2 alert-primary row justify-content-center">Hello/react</h1>
    <p class="py-4 center-block row justify-content-center">{{$msg}}</p>

    <!-- <div id="example"></div> -->

    <div id="mycomponent"></div>

    <script src="{{asset('/js/app.js')}}"></script>
  </body>
</html>
