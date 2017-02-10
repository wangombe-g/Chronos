<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Storage;

use App\Queries;
use App\UUID;

use Illuminate\Support\Facades\DB;

use App\Database;

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

            $dbs = Database::all()->distinct();

            foreach ($dbs as $database) {              
                $data = array();
                $data['database'] = $database->db_name;
                $data['database_uuid'] = $database->uuid; 
                $data['last_sync_date'] = $database->last_sync_date;
                $data['sync_date'] = date('d-m-Y H:i:s');

                $all_tables_data = array();
                $tables = Queries::AllTables();

                foreach($tables as $key => $value)
                {
                    $data = DB::connection($database->db_name)->select($value);
                    $all_tables_data[$key] = $data;

                }
                $data['tables'] = $all_tables_data;
                Storage::put(date('d-m-Y-H_i') . '.json', json_encode($data));
            }
            
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
