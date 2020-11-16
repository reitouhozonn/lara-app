<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\collection;

class Person extends Model
{
  public function getNameAndIdAttribute()
  {
    return $this->name . ' [id=' . $this->id .']';
  }

  public function getNameAndMailAttribute()
  {
    return $this->name . ' (' . $this->mail . ')';
  }

  public function getNameAndAgeAttribute()
  {
    return $this->name . '(' . $this->age . ')';
  }

  public function getAllDataAttribute()
  {
    return $this->name . '(' . $this->age . ')'
      . ' [' . $this->mail . ']';
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
