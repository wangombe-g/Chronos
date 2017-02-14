<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\User;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('/settings/index', [
            'user' => Auth::user(),
        ]);

    }

    public function update(Request $request)
    {
        // validate input
        $this->validate($request, [
            '_current_password' => 'required',
            '_current_password' => 'numeric',
        ]);

        $user = User::where('uuid', Auth::user()->uuid)->firstOrFail();

        $_username = $request['_username'];
        $email = $request['_email'];
        $endpoint = $request['_endpoint'];
        $days = $request['_days'];

        $user->username = $_username;
        $user->email = $email;
        $user->endpoint = $endpoint;
        $user->days = $days;

        $user->save();

        return redirect()->action('Settings\SettingsController@index');
        /*return response()->json([
            'message' => 'Settings updated'
        ]);*/
    }

/*    public function updateEmail(Request $request)
    {
        // validate input
        $this->validate($request, [
            '_email' => 'required',
        ]);
        $user = User::where('uuid', Auth::user()->uuid)->get();
        $user->email = $request['_email'];
        $user->save();

        return response()->json([
            'message' => 'Email updated'
        ]);
    }

    public function updatePasswords(Resquest $request)
    {
        // validate input
        $this->validate($request, [
            '_password' => 'required',
        ]);
        $user = User::where('uuid', Auth::user()->uuid)->get();
        $user->password = bcrypt($request['_password']);
        $user->save();

        return response()->json([
            'message' => 'Password updated'
        ]);
    }
    public function updateUsername(Request $request)
    {
        // validate input
        $this->validate($request, [
            '_username' => 'required',
        ]);
        $user = User::where('uuid', Auth::user()->uuid)->get();
        $user->username = $request['_username'];
        $user->save();

        return response()->json([
            'message' => 'Username updated'
        ]);
    }*/
}
