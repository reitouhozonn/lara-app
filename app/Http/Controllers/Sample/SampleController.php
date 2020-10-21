<?php

namespace App\HTTP\Controllers\Sample;

use App\HTTP\Controllers\Controller;
use Illuminate\Http\Request;

/**
 *
 */
class SampleController extends Controller
{

  function __construct()
  {
    config(['sample.message' => 'new message']);
  }

  public function index()
  {
    $sample_msg = config('sample.message');
    $sample_data = config('sample.data');

    $data = [
      'msg' => $sample_msg,
      'data' => $sample_data,
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
