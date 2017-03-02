<?php
namespace App;

use App\Database;

use App\Queries;
use App\UUID;
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;

class DatabaseSync {

    public static function sync($database) {
        
        $tables_time = Queries::AllTablesWithTimeConstraint($database->last_sync_date);
        $tables = Queries::AllTables();

        if($database == null)
        {
            $dbs = Database::all();
            foreach ($dbs as $database)
                DatabaseSync::doJob($tables_time, $database);
        }
        else if( $database->last_sync_date == null)
            DatabaseSync::doJob($tables, $database);
        else
            DatabaseSync::doJob($tables_time, $database);

    }

    public static function doJob($tables, $database)
    {
        $data = array();
        $data['client'] = $database->db_name;
        $data['client_id'] = $database->uuid; 
        $data['last_sync_date'] = $database->last_sync_date;
        $data['sync_date'] = date('Y-m-d H:i:s');

        $all_tables_data = array();
        
        foreach($tables as $key => $value)
        {   
            try
            {
                $table_data = DB::connection($database->db_name)->select($value);
            }
            catch(QueryException $ex)
            {
                 Storage::put(date('d-m-Y-H_i') . 'log.json', (string)$ex);
                 continue;
            }
            

            foreach($table_data as $td)
            {
                if($key === 'gnote_imports')
                {
                    $td->client_id = $database->uuid;
                    $td->o_id = $database->product_id;
                    continue;
                }
                $td->client_id = $database->uuid;
                $td->o_id = $td->id;
            }

            $all_tables_data[$key] = $table_data;
        }
        $data['tables'] = $all_tables_data;

        $endpoint = User::find(1)->endpoint;
       
        $ch = curl_init($endpoint);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen(json_encode($data)))
        );                                                               

        $result = curl_exec($ch);

        if (!curl_errno($ch))
        {
            Storage::put(date('d-m-Y-H_i') . '.json', json_encode($data));
            $database->last_sync_date = date('Y-m-d H:i:s');
            $database->status = 1;
            $database->save();
        } else {
            Storage::put(date('d-m-Y-H_i') . 'log.json', $result);
        }
        curl_close($ch);

    }

}