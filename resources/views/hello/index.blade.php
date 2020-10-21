<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>index</title>
  </head>
  <body>
    <h1>Hello/Index</h1>
    <p>{!!$msg!!}</p>
    <ul>
      @foreach($data as $item)
      <li>{!!$item!!}</li>
      @endforeach
    </ul>
    <a href="http://127.0.0.1:8000/hello/other">other</a>
  </body>
</html>
