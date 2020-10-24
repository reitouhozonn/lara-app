<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\person;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $fname;


     function __construct()
     {
       $this->fname = 'hello.txt';
     }

    public function index()
    {
        $url = Storage::disk('public')->url($this->fname);
        $size = Storage::disk('public')->size($this->fname);
        $modified = Storage::disk('public')->lastModified($this->fname);

        $sample_keys = ['url', 'size', 'modified'];
        $sample_meta = [$url, $size, $modified];

        $result = '<table><tr><th>' . implode('</th><th>',
        $sample_keys) . '</th></tr>';
        $result .= '<tr><td>' . implode('</td><td>',
        $sample_meta) . '</td></tr></table>';

        $sample_data = Storage::disk('public')->get($this->fname);

        $data = [
          'msg' => $result,
          'data' => explode(PHP_EOL, $sample_data)
        ];

        return view('hello.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function other($msg)
    {
      Storage::disk('public')->delete('bk_' . $this->fname);
      Storage::disk('public')->copy($this->fname,
        'bk_' . $this->fname);
      Storage::disk('local')->delete('bk_' . $this->fname);
      Storage::disk('local')->move('public/bk_' . $this->fname,
        'bk_' . $this->fname);

      return redirect()->route('hello');
    }



}
