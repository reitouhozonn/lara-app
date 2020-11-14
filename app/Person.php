<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\collection;

class Person extends Model
{

  public function fi()
  {
    $item = $this->first();
    return array_keys($item->toArray());

  }




  public function newCollection(array $models = [])
  {
    return new MyCollection($models);
  }

}


/**
 *
 */
class MyCollection extends Collection
{

  // function __construct(argument)
  // {
  //   // code...
  // }

  public function fields()
  {
    $item = $this->first();
    return array_keys($item->toArray());
  }
}
