<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SchoolYearController extends Controller
{
	public function get(Request $request) {
		$response = ['success' => false, 'msg' => 'No record found'];

		$getAll = DB::table('school_years')->get();
		$data = [];
		foreach ($getAll as $all) {
			$data[] = [
				'id'	=> $all->id,
				'title' => $all->title,
				'description' => $all->description
			];
		}

		return response()->json(['success' => true, 'data' => $data], 200);
	}

    public function create(Request $request) {

    	$validation = Validator::make($request->json()->all(), [
            'title' => 'required|min:3',
        ]);

		$return = [];
        if($validation->fails()){
        	$errors = $validation->errors();
			return response()->json(['success' => false, 'error' => $errors->toJson()], 200);
        } else {
        	if (DB::table('school_years')->insert([
        		'title' => $request->title,
        		'description' => $request->description
        	])) {
        		return response()->json(['success' => true, 'msg' => 'School Year successfully added'], 200);
        	}
        }
    }

    public function getById($id) {
    	$return = ['success' => false];

    	$data = DB::table('school_years')->where('id', $id)->first();
        $teachers = DB::table('teacher_assign AS ta')
                    ->select('users.*')
                    ->where('ta.schoolYear_id', $id)
                    ->join('users', 'users.id', '=', 'ta.teacher_id')
                    ->get();

        $allTeach = [];
        foreach ($teachers as $t) {
            $allTeach[] = [
                'teacher_id' => $t->id,
                'teachers_name' => $t->last_name .', '. $t->first_name . ' '. $t->middle_name,
            ];
        }
    	return response()->json(['success' => true, 'data' => $data, 'teachers' => $allTeach], 200);
    }
}