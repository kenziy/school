<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function get(Request $request) {
        $response = ['success' => false, 'msg' => 'No record found'];
        $user = auth()->user();
        $getAll = DB::table('students')->where('guardian_id', $user->id)->get();
        $data = [];
        foreach ($getAll as $all) {
            $data[] = [
                'id'    		=> $all->id,
                'first_name' 	=> $all->first_name,
                'middle_name' 	=> $all->middle_name,
                'last_name' 	=> $all->last_name,
                'gender' 		=> $all->gender,
                'birthday' 		=> $all->birthday
            ];
        }

        return response()->json(['success' => true, 'data' => $data], 200);
    }

    public function create(Request $request) {
    	$user = auth()->user();
    	$validation = Validator::make($request->json()->all(), [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
        ]);

		$return = [];
        if($validation->fails()){
        	$errors = $validation->errors();
			return response()->json(['success' => false, 'error' => $errors->toJson()], 200);
        } else {
        	if (DB::table('students')->insert([
        		'guardian_id'	   => $user->id,
        		'first_name'       => $request->first_name,
        		'middle_name'      => $request->middle_name,
        		'last_name'        => $request->last_name,
        		'gender'           => $request->gender,
        		'birthday'         => $request->birthday,
        	])) {
        		return response()->json(['success' => true, 'msg' => 'Student successfully added'], 200);
        	}
        }
    }

    public function enroll(Request $request) {
        $validation = Validator::make($request->json()->all(), [
            'student_id' => 'required',
            'sy_id' => 'required',
            'level_id' => 'required',
        ]);

        $return = [];
        if($validation->fails()){
            $errors = $validation->errors();
            return response()->json(['success' => false, 'error' => $errors->toJson()], 200);
        } else {
            $enroll_id = DB::table('enroll_student')->insertGetId([
                            'student_id' => $request->student_id,
                            'sy_id'      => $request->sy_id,
                            'level_id'   => $request->level_id,
                            'status'     => 0,
                        ]);
            $payment = [
                'enroll_id'      => $enroll_id,
                'payment_method' => 0,
                'amount'         => 0,
                'description'    => 'Over the counter',
                'status'         => 0,
                'amount'         => 0
            ];

            if (DB::table('payments')->insert($payment)) {
                return response()->json(['success' => true, 'msg' => 'Student successfully enroll'], 200);
            }
        }
    }
}
