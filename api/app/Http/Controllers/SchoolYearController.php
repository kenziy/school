<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SchoolYearController extends Controller
{
	public function get(Request $request) {
		$response = ['success' => false, 'msg' => 'No record found'];

		$getAll = DB::table('school_years')->orderBy('id', 'desc')->get();
		$data = [];
		foreach ($getAll as $all) {
			$data[] = [
				'id'	             => $all->id,
				'title'              => $all->title,
				'description'        => $all->description,
                'online_enrollment'  => $all->online_enrollment,
                'token'              => $all->token,
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
        		'title'              => $request->title,
        		'description'        => $request->description != "" ? $request->description : '',
                'online_enrollment' => $request->online_enrollment,
                'token'              => Str::random(8)
        	])) {
        		return response()->json(['success' => true, 'msg' => 'School Year successfully added'], 200);
        	}
        }
    }

    public function getById($id) {
    	$return = ['success' => false];

    	$data = DB::table('school_years')->where('id', $id)->first();
        $teachers = DB::table('teacher_assign AS ta')
                    ->select('users.*', 'ta.subjects as subjects', 'ta.rooms as rooms')
                    ->where('ta.schoolYear_id', $id)
                    ->join('users', 'users.id', '=', 'ta.teacher_id')
                    ->get();

        $allTeach = [];
        foreach ($teachers as $t) {
            $allTeach[] = [
                'teacher_id' => $t->id,
                'teachers_name' => $t->last_name .', '. $t->first_name . ' '. $t->middle_name,
                'subjects' => count(json_decode($t->subjects)),
                'rooms' => count(json_decode($t->rooms))
            ];
        }
    	return response()->json(['success' => true, 'data' => $data, 'teachers' => $allTeach], 200);
    }


}
