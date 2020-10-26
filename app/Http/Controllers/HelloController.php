<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

    public function index(Request $request, Response $response)
    {
        $name = $request->query('name');
        $mail = $request->query('mail');
        $tel = $request ->query('tel');
        $msg = $name . ', ' . $mail . ', ' . $tel;
        $keys = ['名前', 'メール', '電話'];
        $values = [$name, $mail, $tel];
        // $msg = 'please input text:';
        // $keys = [];
        // $values = [];
        //
        //   $form = $request->only(['name', 'mail', 'tel']);
        //   $keys = array_keys($form);
        //   $values = array_values($form);
        //   $msg = old('name') . ', ' . old('mail') . ', ' .
        //     old('tel');
        //   $data = [
        //     'msg' => $msg,
        //     'keys' => $keys,
        //     'values' => $values,
        //   ];
        //   $request->flash();
        //   return view('hello.index', $data);

        $data = [
          'msg' => $msg,
          'keys' => $keys,
          'values' => $values,
        ];
      // $dir = '/';
      // $all = Storage::disk('logs')->allfiles($dir);
      //
      // $data = [
      //   'msg' => 'DIR:' . $dir,
      //   'data' => $all
      // ];
      $request->flash();
      return view('hello.index', $data);

        // $url = Storage::disk('public')->url($this->fname);
        // $size = Storage::disk('public')->size($this->fname);
        // $modified = Storage::disk('public')->lastModified($this->fname);
        //
        // $sample_keys = ['url', 'size', 'modified'];
        // $sample_meta = [$url, $size, $modified];
        //
        // $result = '<table><tr><th>' . implode('</th><th>',
        // $sample_keys) . '</th></tr>';
        // $result .= '<tr><td>' . implode('</td><td>',
        // $sample_meta) . '</td></tr></table>';
        //
        // $sample_data = Storage::disk('public')->get($this->fname);
        //
        // $data = [
        //   'msg' => $result,
        //   'data' => explode(PHP_EOL, $sample_data)
        // ];
        //
        // return view('hello.index', $data);
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

    public function other(Request $request)
    {
      // if (Storage::disk('public')->exists('bk_' . $this->fname)) {
      //       Storage::disk('public')->delete('bk_' . $this->fname);
      // }
      //
      // Storage::disk('public')->copy($this->fname,
      //   'bk_' . $this->fname);
      //
      // if (Storage::disk('local')->exists('bk_' . $this->fname)) {
      //       Storage::disk('local')->delete('bk_' . $this->fname);
      // }
      //
      // Storage::disk('local')->move('public/bk_' . $this->fname,
      //   'bk_' . $this->fname);
      //
      // return redirect()->route('hello');

      // return Storage::disk('public')->download($this->fname);
      // $ext =  '.' . $request->file('file')->extension();
      //
      // Storage::disk('public')->
      //   putFileAs('files', $request->file('file'), 'uploaded' . $ext);
      //
      //   return redirect()->route('hello');

      $data = [
        'name' => 'taro',
        'mail' => 'taro@exsmple',
        'tel' => '123456789',
      ];

      $query_str = http_build_query($data);
      $data['msg'] = $query_str;
      return redirect()->route('hello', $data);


    }



}
