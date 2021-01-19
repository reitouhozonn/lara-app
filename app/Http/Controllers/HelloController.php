<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\person;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\MyClasses\MyService;
// use App\Providers\MyJobProvider;
use App\Jobs\MyJob;
use App\Events\PersonEvent;
use Illuminate\support\Facades\Artisan;


class HelloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $fname;


     // function __construct(MyService $myservice)
     // {
     //   $myservice = app('App\MyClasses\MyService');
     // }

    public function index()
    {


      // if ($person != null) {
      //   $qname = $person->id % 2 === 0 ? 'even' : 'add';
      //   MyJob::dispatch($person)->onQueue($qname);
      // }

      // MyJob::dispatch();
      $msg = 'show people record.';
      $re = Person::get();
      $fields = Person::get()->fields();

      $data = [
        'input' => '',
        'msg' => $msg,
        'data' => $re,
      ];

      return view('hello.index', $data);

      // $msg = 'show people message';
      // $keys = Person::get()->modelkeys();
      // $even = Person::get()->filter(function($item)
      // {
      //   return $item->id % 2 == 0;
      // });
      // $map = $even->map(function($item, $key)
      // {
      //   return $item->id . ':' . $item->name;
      // });
      // $even2 = Person::get()->filter(function($item)
      // {
      //   return $item->age % 2 == 0;
      // });
      // $result = $even;







      // if ($id >= 0 ) {
      //   $msg = 'get name like "' . $id . '".';
      //   $result = DB::table('people')->where(
      // 'name', 'like', '%' . $id . '%')
      //     ->get();
      // }else {
      //   $msg = 'get people records.';
      //   $result = DB::table('people')->get();
      // }
        // $ids = explode(',', $id);
        // $id = $request->query('pege');
        // $msg = 'get people records.';
        // $first = Person::paginate(3);
        // // dd($first);
        // // $last = DB::table('people')->orderBy('id',
         // 'desc')->first();
        //
        // $data = [
        //   'msg' => $msg,
        //   'data' => $first,
        // ];
        //
        // return view('hello.index', $data);
        // $name = $request->query('name');
        // $mail = $request->query('mail');
        // $tel = $request ->query('tel');
        // $msg = $name . ', ' . $mail . ', ' . $tel;
        // $keys = ['名前', 'メール', '電話'];
        // $values = [$name, $mail, $tel];
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

        // $data = [
        //   'msg' => $msg,
        //   'keys' => $keys,
        //   'values' => $values,
        // ];
      // $dir = '/';
      // $all = Storage::disk('logs')->allfiles($dir);
      //
      // $data = [
      //   'msg' => 'DIR:' . $dir,
      //   'data' => $all
      // ];
      // $request->flash();
      // return view('hello.index', $data);

        // $url = Storage::disk('public')->url($this->fname);
        // $size = Storage::disk('public')->size($this->fname);
        // $modified = Storage::disk('public')->
        // lastModified($this->fname);
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

    public function save($id, $name)
    {
      $record = Person::find($id);
      $record->name = $name;
      $record->save();

      return redirect()->route('hello');
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

    public function send(Request $request)
    {
      $id = $request->input('id');
      $person = Person::find($id);

      event(new PersonEvent($person));
      $data = [
        'input' => '',
        'msg' => 'id='. $id,
        'data' => [$person],
      ];
      return view('hello.index', $data);
      // dispatch(function() use ($person)
      // {
      //   Storage::append('person_access_log.txt',
      //   $person->all_data);
      // });
      // return redirect()->route('hello');

      // $input  = $request->input('find');
      // $msg = 'search: ' . $input;
      // $result = Person::search($input)->get();
      // $data = [
      //   'input' => $input,
      //   'msg' => $msg,
      //   'data' => $result,
      // ];
      // return view('hello.index', $data);
    }



      public function json($id = -1)
      {
        if ($id == -1) {
          return Person::get()->toJson();
        } else {
          return Person::find($id)->toJson();
        }

      }

      public function clear()
      {
        Artisan::call('cashe:clear');
        Artisan::call('event:clear');

        return redirect()->route('hello');
      }

    public function other()
    {
      $person = new Person();
      $person->all_data = ['hanako', 'bbb@example.com', 99];
      $person->save();

      return redirect()->route('hello');



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

      // $data = [
      //   'name' => 'taro',
      //   'mail' => 'taro@exsmple',
      //   'tel' => '123456789',
      // ];
      //
      // $query_str = http_build_query($data);
      // $data['msg'] = $query_str;
      // return redirect()->route('hello', $data);


    }



}
