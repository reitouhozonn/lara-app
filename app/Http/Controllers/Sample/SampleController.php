<?php

namespace App\HTTP\Controllers\Sample;

use App\HTTP\Controllers\Controller;
use Illuminate\Http\Request;

/**
 *
 */
class SampleController extends Controller
{

  public function index(Request $request)
  {
    $data = [
      'msg' => 'Sample-index',
    ];

    return view('hello.index', $data);
  }


  public function other(Request $request)
  {
    $data = [
      'msg' => 'Sample-other',
    ];

    return view('hello.index', $data);
  }



}
