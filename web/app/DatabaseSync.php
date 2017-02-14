<?php
namespace App;

use App\Database;

use App\Queries;
use App\UUID;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DatabaseSync {

    public static function syncAll() {
        
        $dbs = Database::all();
        $tables_time = Queries::AllTablesWithTimeConstraint(Auth::user()->time);
        $tables = Queries::AllTables();

        foreach ($dbs as $database) {

            if( $database->last_sync_date == null)
                DatabaseSync::doJob($tables, $database);
            else
                DatabaseSync::doJob($tables_time, $database);
            
        }
    }

    public static function doJob($tables, $database)
    {
        $data = array();
        $data['database'] = $database->db_name;
        $data['database_uuid'] = $database->uuid; 
        $data['last_sync_date'] = $database->last_sync_date;
        $data['sync_date'] = date('Y-m-d H:i:s');

        $all_tables_data = array();
        
        foreach($tables as $key => $value)
        {
            $table_data = DB::connection($database->db_name)->select($value);
            $all_tables_data[$key] = $table_data;

        }
        $data['tables'] = $all_tables_data;

        Storage::put(date('d-m-Y-H_i') . '.json', json_encode($data));

        $database->last_sync_date = date('Y-m-d H:i:s');
        $database->status = 1;
        $database->save();
    }

}