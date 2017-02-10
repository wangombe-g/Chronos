<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Storage;

use App\Queries;
use App\UUID;

use Illuminate\Support\Facades\DB;

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
        $schedule->call(function() {

            $lattana = array();
            $lattana['database'] = "lattana";
            $lattana['client_id'] = UUID::v4();
            
            $lattana_one = array();
            $lattana_one['database'] = "lattana_one";
            $lattana_one['client_id'] = UUID::v4();     

            $all_tables_lattana = array(); 
            $all_tables_lattana_one = array(); 
            
            $tables = Queries::AllTables();
            foreach($tables as $key => $value)
            {
                $lattana_data = DB::connection("lattana")->select($value);
                $all_tables_lattana[$key] = $lattana_data;


                $lattana_one_data = DB::connection("lattana_one")->select($value);
                $all_tables_lattana_one[$key] = $lattana_one_data;
                
            }
            $lattana['tables'] = $all_tables_lattana;
            $lattana_one['tables'] = $all_tables_lattana_one;
            
            Storage::put(date('d-m-Y-H_i') . '-lattana.json', json_encode($lattana));
            Storage::put(date('d-m-Y-H_i') . '-lattana_one.json', json_encode($lattana_one));
            
        })->everyMinute();//->dailyAt('01:00');

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
