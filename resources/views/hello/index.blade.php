<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>index</title>
    <style media="screen">
      th {background-color: red; padding: 10px;}
      td { background-color: #eee; padding: 10px;}
    </style>
  </head>
  <body>
    <h1>Hello/Index</h1>
    <p>{!!$msg!!}</p>
    <a href="http://127.0.0.1:8000/hello/other">other</a>
    <!-- <p><a href="/hello/other">download</a></p> -->

    <form class="" action="/hello" method="get" >
      @csrf
      <div class="">NAME:
        <input type="text" name="name" value="{{old('name')}}">
      </div>
      <div class="">MAIL:
        <input type="text" name="mail" value="{{old('mail')}}">
      </div>
      <div class="">TEL:
        <input type="text" name="tel" value="{{old('tel')}}">
      </div>
      <input type="submit">
    </form>
    <hr>
    <ol>
      @for($i = 0; $i < count($keys); $i++)
        <li>{{$keys[$i]}} : {{$values[$i]}}</li>
      @endfor
    </ol>
  </body>
</html>
