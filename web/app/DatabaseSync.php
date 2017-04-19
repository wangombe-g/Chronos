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

set_time_limit(360);

class DatabaseSync {

    public static function sync($database) {
        
        
        $tables = Queries::AllTables();

        if(is_null($database))
        {
            $dbs = Database::all();
            foreach ($dbs as $database)
            {
                if(is_null($database->last_sync_date))
                {
                    DatabaseSync::doJob($tables, $database);
                }                
                else
                {
                    $tables_time = Queries::AllTablesWithTimeConstraint($database->last_sync_date);
                    DatabaseSync::doJob($tables_time, $database);
                }
            }
        }
        else if(is_null($database->last_sync_date))
            DatabaseSync::doJob($tables, $database);
        else
        {
            $tables_time = Queries::AllTablesWithTimeConstraint($database->last_sync_date);
            DatabaseSync::doJob($tables_time, $database);
        }

    }

    public static function doJob($tables, $database)
    {
        $data = array();
        $data['client'] = $database->db_name;
        $data['client_id'] = $database->uuid; 
        $data['last_sync_date'] = $database->last_sync_date;
        $data['sync_date'] = date('Y-m-d H:i:s');

        $all_tables_data = array();

        /*
        This block is to be used only for the Governor(Notifyr)
        */
        if($database->db_name === 'ci_agrisms_governor' && is_null($database->last_sync_date))
            $tables = Queries::GovernorTables();
        else if($database->db_name === 'ci_agrisms_governor')
            $tables = Queries::GovernorTablesWithTimeConstraint($database->last_sync_date);
        
        foreach($tables as $key => $value)
        {   
            try
            {
                $table_data = DB::connection($database->db_name)->select($value);
                foreach($table_data as $td)
                {
                    if($key === 'gnote_imports')
                    {
                        $td->client_id = $database->uuid;
                        $td->o_id = $td->product_id;
                        continue;
                    }
                    $td->client_id = $database->uuid;
                    $td->o_id = $td->id;
                }

            }
            catch(QueryException $ex)
            {
                 continue;
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
        $info = curl_getinfo($ch);

        if (!curl_errno($ch))
        {
            switch ($http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE)) {
                case 200:  # OK
                    //Storage::put(date('d-m-Y-H_i') . '.json', json_encode($data));
                    $database->last_sync_date = date('Y-m-d H:i:s');
                    $database->status = 1;
                    $database->save();
                break;
                default:
                Storage::put(date('d-m-Y-H_i') . '-log.json', 
                'Took '. $info['total_time']. ' seconds to send a request to '. $info['url']. "\n,".
                'System returned ' . $info['http_code'] . '\n'.
                $result);
            }
        }
        curl_close($ch);

    }

}
