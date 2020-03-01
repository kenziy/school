<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PassportController extends Controller
{
    public function register(Request $request) {

        $validation = Validator::make($request->json()->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if($validation->fails()){
        	$errors = $validation->errors();
			return response()->json(['success' => false, 'error' => $errors->toJson()], 200);

        } else {
	        $user = User::create([
                    'name'              => $request->name,
                    'email'             => $request->email,
                    'password'          => bcrypt($request->password),

                ]);
	 
	        $token = $user->createToken('schoolSystem')->accessToken;
	        return response()->json(['success' => true, 'token' => $token], 200);
        }
 
    }

    public function login(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('schoolSystem')->accessToken;
            $user_role = auth()->user()->role;
            // var_dump($user_role->role);
            // die();
            return response()->json(['success' => true, 'token' => $token, 'role' => $user_role], 200);
        } else {
            return response()->json(['success' => false, 'error' => 'Authentication failed'], 401);
        }
    }

    public function user() {
        $return = ['success' => false];
        $user = auth()->user();

        $return = [
            'success' => true,
            'user' => $user
        ];

        // var_dump($return);
        return response()->json($return, 200);
    }

    public function create(Request $request) {

        $validation = Validator::make($request->json()->all(), [
            'email' => 'required|email|unique:users',
        ]);

        $return = [];
        if($validation->fails()){
            $errors = $validation->errors();
            return response()->json(['success' => false, 'error' => $errors->toJson()], 200);
        } else {

            $temp_pass = Str::random(6);
            if (DB::table('users')->insert([
                'first_name'    => $request->first_name != "" ? $request->first_name : '',
                'middle_name'   => $request->middle_name != "" ? $request->middle_name : '',
                'last_name'     => $request->last_name != "" ? $request->last_name : '',
                'birthday'      => $request->birthday != "" ? $request->birthday : '',
                'gender'        => $request->gender != "" ? $request->gender : 1,
                'address'       => $request->address != "" ? $request->address : '',
                'email'         => $request->email,
                'role'          => $request->role != "" ? $request->role : 3,

                'picture'       => '',

                'password'      => bcrypt($temp_pass),
                'temp_pass'     => $temp_pass
            ])) {
                return response()->json(['success' => true, 'msg' => 'Room successfully added'], 200);
            }
        }
    }

    public function all(Request $request) {
        $response = ['success' => false, 'msg' => 'No record found'];

        $getAll = DB::table('users')->get();
        $data = [];
        foreach ($getAll as $all) {
            $data[] = [
                'id'            => $all->id,
                'first_name'    => $all->first_name,
                'middle_name'   => $all->middle_name,
                'last_name'     => $all->last_name,
                'email'         => $all->email,
                'gender'        => $all->gender == 1 ? 'Male' : 'Female',
                'role'          => $all->role == 1 ? 'Admin' : 'Teacher',
                'temp_pass'     => $all->temp_pass,
                'created_at'    => $all->created_at,
            ];
        }

        return response()->json(['success' => true, 'data' => $data], 200);
    }

    public function teacher(Request $request) {
        $response = ['success' => false, 'msg' => 'No record found'];

        $getAll = DB::table('users')->where('role', 2)->get();
        $data = [];
        foreach ($getAll as $all) {
            $data[] = [
                'id'            => $all->id,
                'first_name'    => $all->first_name,
                'middle_name'   => $all->middle_name,
                'last_name'     => $all->last_name,
                'email'         => $all->email,
                'gender'        => $all->gender == 1 ? 'Male' : 'Female',
                'role'          => $all->role == 1 ? 'Admin' : 'Teacher',
                'created_at'    => $all->created_at,
            ];
        }

        return response()->json(['success' => true, 'data' => $data], 200);
    }

}
