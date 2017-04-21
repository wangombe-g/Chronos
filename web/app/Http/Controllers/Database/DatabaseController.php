<?php

namespace App\Http\Controllers\Database;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Database;
use App\Client;
use App\UUID;
use App\DatabaseSync;

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
        ]);
    }

    public function newDb()
    {     
        return view('database/form');
    }

    public function publish(Request $request)
    {
    	// validate input
        $this->validate($request, [
            '_name' => 'required',
            '_asp' => 'required|max:2',
        ]);

       	$db = new Database();
        $db->uuid = UUID::v4();
       	$db->db_name = $request['_name'];
       	$db->asp = $request['_asp'];
		$db->save();        

        return redirect()->action('Database\DatabaseController@index');

    }

    public function delete($database)
    {
        $database->forceDelete();

        return redirect()->action('Database\DatabaseController@index');
    }

    public function sync($database)
    {
        DatabaseSync::sync($database);
        return redirect()->action('Database\DatabaseController@index');
    }
}
