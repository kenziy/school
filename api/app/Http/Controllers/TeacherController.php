<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{

    public function create(Request $request) {

        $validation = Validator::make($request->json()->all(), [
            'schoolYear_id' => 'required',
            'teacher_id' 	=> 'required'
        ]);

        $return = [];
        if($validation->fails()){
            $errors = $validation->errors();
            return response()->json(['success' => false, 'error' => $errors->toJson()], 200);
        } else {
            if (DB::table('teacher_assign')->insert([
                'schoolYear_id'     => intval($request->schoolYear_id),
                'teacher_id'   		=> intval($request->teacher_id),
                'rooms'   			=> json_encode($request->rooms),
                'subjects' 			=> json_encode($request->subjects)
            ])) {
                return response()->json(['success' => true, 'msg' => 'Teacher successfully added'], 200);
            }
        }
    }
}
