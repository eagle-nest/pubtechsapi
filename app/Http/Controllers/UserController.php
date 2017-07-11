<?php

namespace App\Http\Controllers;

use App\models\User;
use App\models\Users;
use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;

class UserController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    public function User() {

        $array = array("user" => "tayyab");

        return response()->json($array);
    }

    public function getUser($id) {

        $User = Users::find($id);

        return response()->json($User);
    }

    public function login(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password'=>'required',
        ]);
        
        $email = $request->input('email');
        $password = md5($request->input('password'));

        $User = \App\Models\Users::where('email', $email)->where('password', $password)->get();
        if (count($User) > 0) {
            $User = $User[0];
            return response()->json(['status' => 'success', 'user' => ['name' => $User->name,
                            'email' => $User->email,
                            'phone' => $User->phone,
                            'address' => $User->address,
                            'city' => $User->city,]]);
        }
        return response()->json(['status' => 'error', 'message' => 'Incorrect Email or Password.']);
    }

    public function signup(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password'=>'required',
            'phone'=>'required|number',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $phone = $request->input('phone');
        $role = \App\Models\Users::ROLE_USER;

        $User = Users::create(['name' => $name,
                    'email' => $email,
                    'password' => md5($password),
                    'phone' => $phone,
                    'user_role' => $role]);

        return response()->json(['status' => 'success', 'user' => ['name' => $User->name,
                        'email' => $User->email,
                        'phone' => $User->phone,]]);
    }

    public function createUser(Request $request) {

        $User = User::create($request->all());

        return response()->json($User);
    }

    public function deleteUser($id) {
        $User = User::find($id);
        $User->delete();

        return response()->json('deleted');
    }

    //
}
