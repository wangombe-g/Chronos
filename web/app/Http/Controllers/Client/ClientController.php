<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use App\Client;
use App\Database;
use App\UUID;


class ClientController extends Controller
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
        $clients = Client::leftJoin('databases', 'databases.client_uuid', '=', 'clients.uuid')
            ->select('clients.*',
                DB::raw('COUNT(databases.id) as dbs'))
            ->distinct()
            ->paginate(10);
        return view('/clients/index', [
            'clients' => $clients,
        ]);
    }
    
    //create a new client
    public function publish(Request $request)
    {
    	// validate input
        $this->validate($request, [
            '_name' => 'required',
        ]);

       	$client = new Client;
        $client->uuid = UUID::v4();
        $client->name = $request['_name'];
		$client->save();

		return response()->json([
		    'message' => 'Client info has been updated'
		]);
    }
}
