<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\person;
use App\Jobs\MyJob;
use Storage;
// use Illuminate\Support\Facades\Storage;
// use ScheduleObj;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $count = Person::all()->count();
        $id = rand(0, $count) + 1;
        // $obj = new ScheduleObj($id);
        // $schedule->call($obj);
        // $schedule->call(new MyJob($id));
        $schedule->job(new MyJob($id));

        // $schedule->exec('bash ./mycmd.sh');
        // $schedule->command('queue:work --stop-when-empty');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}


class ScheduleObj
{
  private $person;

  function __construct($id)
  {
    $this->person = Person::find($id);
  }

  public function __invoke()
  {
    Storage::append('person_access_log.txt',
      now().' '.$this->person->all_data);
    MyJob::dispatch($this->person);
    return 'true';
  }
}
