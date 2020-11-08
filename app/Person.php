<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    $msg = 'show people message!';
    $result = Person::get();

    $data = [
      'msg' => $msg,
      'result' => $result,
    ];

    return view('hello.index', $data);
}
