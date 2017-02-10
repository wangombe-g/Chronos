<?php

namespace App\Http\Controllers\Database;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Database;
use App\Client;
use App\UUID;

class DatabaseController extends Controller
{
   	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    *Display a list of provisioned databases
    *
    *@return a list of approved suggestions belonging to the currently logged in user
    */
    public function index()
    {   
        $databases = Database::paginate(10);
        return view('database/index', [
            'databases' => $databases,
            'clients' => Client::all(),
        ]);
    }

    public function publish(Request $request)
    {
    	// validate input
        $this->validate($request, [
            '_client' => 'required',
            '_name' => 'required',
        ]);

       	$db = Database();
        $db->uuid = UUID::v4();
       	$db->db_name = $request['_name'];
       	$db->clinent_uuid = $request['_client'];
		$db->save();

		return response()->json([
		    'message' => 'Database info has been updated'
		]);
    }

    public function delete($database)
    {
        $database->forceDelete();

        return response()->json([
            'message' => 'Database connection info has been permanently deleted'
        ]);
    }
    public function triggerSync(Request $request)
    {
        return response()->json([
            'message' => 'sync done!'
        ]);
    }
}
