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

    public function dashboard(Request $request) {
        $user = auth()->user();
        $mySched = DB::table('teacher_assign as ta')
                    ->select('sa.id as sy_id', 'sa.title as title', 'ta.*')
                    ->join('school_years as sa', 'sa.id', '=', 'ta.schoolYear_id')
                    ->where('ta.teacher_id', $user->id)
                    ->get();
        $data = [];
        foreach ($mySched as $s) {
            $data[] = [
                'id'        => $s->sy_id,
                'title'     => $s->title,
                'subjects'  => count(json_decode($s->subjects)),
                'rooms'     => count(json_decode($s->rooms)),
            ];
        }
        return response()->json(['success' => true, 'msg' => 'Teacher successfully added'], 200);
    }
}
