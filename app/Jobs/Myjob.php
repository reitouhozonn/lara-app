<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Person;
use Storage;

class Myjob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $person;


    public function getPersnId()
    {
      return $this->Person->id;
    }
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->person = Person::find($id)->first();
    }

    public function __invoke()
    {
      $this->handle();
    }

    public function handle()
    {
      $this->dojob();
    }
    /**
     * Execute the job.
     *
     * @return void
     */


    public function dojob()
    {
        // echo '<p class="myjob">THIS IS MYJYB!!</p>';
        $sufix = ' [+MYJOB]';
        if (strpos($this->person->name, $sufix)) {
            $this->person->name = str_replace( $sufix, '',
            $this->person->name);
        }else {
          $this->person->name .= $sufix;
        }
        $this->person->save();

        Storage::append('person_access_log.txt',
        now().' '.$this->person->all_data);
    }
}
