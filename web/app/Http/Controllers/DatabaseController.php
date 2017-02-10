<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Database;

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
        $databases = Database::all()
            ->distinct()
            ->paginate(10);
        return view('index', [
            'databases' => $databases,
        ]);
    }

    public function update(Request $request)
    {
    	// validate input
        $this->validate($request, [
            'db_name' => 'required',
            'db_username' => 'required',
            'db_password' => 'required',
        ]);

       	$db = Database::where('uuid', $request['uuid'])->firstOrFail()
       	$db->db_name = $request['db_name'];
       	$db->db_username = $request['db_username'];
       	$db->db_password = $request['db_password'];
		$db->save()

		return response()->json([
		    'message' => 'Database info has been updated'
		]);
    }

    public function delete(Database $database)
    {
    	$database->softDeletes();

		return response()->json([
		    'message' => 'Database has been sent to trash'
		]);
    }

    public function viewTrash(Database $database)
    {
    	$database->softDeletes();

		return response()->json([
		    'message' => 'Database has been sent to trash'
		]);
    }

    public function deletePermanently(Database $database)
    {
    	$database->softDeletes();

		return response()->json([
		    'message' => 'Database has been sent to trash'
		]);
    }
}
