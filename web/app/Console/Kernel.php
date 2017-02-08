<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Storage;

use App\CellarWine;
use App\Cellar1Wine;

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
        $schedule->call(function(){
            $db1 = CellarWine::all();
            $db2 = Cellar1Wine::all();

            Storage::put(date('d-m-Y--H_i_s'), $db1->toArray()[0]);
            Storage::put(date('d-m-Y--H_i_s-1'), $db2->toArray()[2]);
        })->everyFiveMinutes();//->dailyAt('00:00');

    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
