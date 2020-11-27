<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>index</title>
    <style media="screen">
      th {background-color: red; padding: 10px;}
      td { background-color: #eee; padding: 10px;}
    </style>
    <!-- <link rel="stylesheet" href="/css/main.css"> -->

    <script type="text/javascript">
      function doAction() {
        var id = document.querySelector('#id').value;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/hello/json/' + id, true);
        xhr.responseType = 'json';
        xhr.onload = function(e) {
          if (this.status == 200) {
            var result = this.response;
            document.querySelector('#name').textContent
                = result.name;
            document.querySelector('#mail').textContent
                = result.mail;
            document.querySelector('#age').textContent
                = result.age;
          }
        };
        xhr.send();
      }
    </script>

  </head>
  <body>
    <h1>Hello/Index</h1>
    <p>{!!$msg!!}</p>
<div class="">
  <input type="number" id="id" value="1">
  <button onclick="doAction();">Click</button>
</div>
<ul>
  <li id="name"></li>
  <li id="mail"></li>
  <li id="age"></li>
</ul>

<h2>search!!</h2>
  <div class="">
    <form action="/hello" method="post">
      @csrf
      <input id="find" type="text" name="find" value="{{$input}}">
      <input type="submit" name="" value="Click">
    </form>
  </div>
  <hr>
  <table border="1">
    @foreach($data as $item)
    <tr>
      <th>{{ $item->id }}</th>
      <td>{{ $item->all_data }}</td>
    </tr>
    @endforeach
  </table>
  <hr>

    <!-- <table border="1">
      @foreach($data as $item)
      <tr>
        <th>{{$item->id}}</th>
        <td>{{$item->name_and_age}}</td>
      </tr>
      @endforeach
    </table> -->
  </body>
</html>
