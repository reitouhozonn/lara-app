<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>index</title>
    <style media="screen">
      th {background-color: red; padding: 10px;}
      td { background-color: #eee; padding: 10px;}
    </style>
    <link rel="stylesheet" href="/css/main.css">
  </head>
  <body>
    <h1>Hello/Index</h1>
    <p>{!!$msg!!}</p>
    <table border="1">
      @foreach($data as $item)
      <tr>
        <th>{{$item->id}}</th>
        <td>{{$item->name_and_age}}</td>
      </tr>
      @endforeach
    </table>
  </body>
</html>
