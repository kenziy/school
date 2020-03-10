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

    public function open() {
        $response = ['success' => false, 'msg' => 'No record found'];

        $getAll = DB::table('school_years')->orderBy('id', 'desc')->where('online_enrollment', 1)->get();
        $data = [];
        foreach ($getAll as $all) {
            $data[] = [
                'id'                 => $all->id,
                'title'              => $all->title,
                'description'        => $all->description,
                'online_enrollment'  => $all->online_enrollment,
                'token'              => $all->token,
            ];
        }

        return response()->json(['success' => true, 'data' => $data], 200);
    }

    public function queue($sy_id) {
        $response = ['success' => false, 'msg' => 'No record found'];

        $getAll = DB::table('enroll_student as es')
                    ->select('s.first_name', 's.middle_name', 's.last_name', 'es.status', 'u.first_name as pfname', 'u.middle_name as pmname', 'u.last_name as plname', 'es.*', 'l.title as level')
                    ->join('students as s', 's.id', '=', 'es.student_id')
                    ->join('users as u', 'u.id', '=', 's.guardian_id')
                    ->join('levels as l', 'l.id', '=', 'es.level_id')
                    ->orderBy('es.id', 'desc')
                    ->where('es.status', 0)->get();
        $data = [];
        foreach ($getAll as $all) {
            $data[] = [
                'id'                 => $all->id,
                'name'               => $all->last_name . ', ' . $all->first_name . ' ' . $all->middle_name,
                'guardian'           => $all->pfname . ', ' . $all->plname . ' ' . $all->pmname,
                'status'             => $all->status == 0 ? "pending" : "approved",
                'level'              => $all->level,
                'date'               => $all->created_at
            ];
        }

        return response()->json(['success' => true, 'data' => $data], 200);
    }

    public function enrolled($sy_id) {
        $response = ['success' => false, 'msg' => 'No record found'];

        $getAll = DB::table('enroll_student as es')
                    ->select('s.first_name', 's.middle_name', 's.last_name', 'es.status', 'u.first_name as pfname', 'u.middle_name as pmname', 'u.last_name as plname', 'es.*', 'l.title as level')
                    ->join('students as s', 's.id', '=', 'es.student_id')
                    ->join('users as u', 'u.id', '=', 's.guardian_id')
                    ->join('levels as l', 'l.id', '=', 'es.level_id')
                    ->orderBy('es.id', 'desc')
                    ->where('es.status', 1)->get();
        $data = [];
        foreach ($getAll as $all) {
            $data[] = [
                'id'                 => $all->id,
                'name'               => $all->last_name . ', ' . $all->first_name . ' ' . $all->middle_name,
                'guardian'           => $all->pfname . ', ' . $all->plname . ' ' . $all->pmname,
                'status'             => $all->status == 0 ? "pending" : "approved",
                'level'              => $all->level,
                'date'               => $all->created_at
            ];
        }

        return response()->json(['success' => true, 'data' => $data], 200);
    }

    public function studentProfile($sy_id, $enroll_id) {
        $data = [];
        $student = DB::table('enroll_student as es')
                        ->select(
                                'es.id as es_id',
                                's.*',
                                'u.first_name as g_fname',
                                'u.middle_name as g_mname',
                                'u.last_name as g_lname',
                                'l.title as level',
                                'l.tuition as tuition'
                            )
                        ->join('students as s', 's.id', '=', 'es.student_id')
                        ->join('users as u', 'u.id', '=', 's.guardian_id')
                        ->join('levels as l', 'l.id', '=', 'es.level_id')
                        ->where('es.sy_id', $sy_id)
                        ->where('es.id', $enroll_id)
                        ->first();
        $payment = DB::table('payments')
                    ->where('enroll_id', $enroll_id)
                    ->get();

        $data = [
            'student' => $student,
            'payments' => $payment
        ];
        return response()->json(['success' => true, 'data' => $data], 200);
    }

    public function approvePayment(Request $request, $sy_id, $es_id) {
        $validation = Validator::make($request->json()->all(), [
            'id' => 'required',
        ]);

        $return = [];
        if($validation->fails()){
            if (DB::table('payments')->where('id', $request->id)->update(['status' => 1])) {
                if (DB::table('enroll_student')->where('id', $es_id)->update(['status' => 1])) {
                    return response()->json(['success' => true], 200);
                }
            }
        }
    }

    public function rooms($sy_id) {
        $rooms = DB::table('rooms')->get();
        return response()->json(['success' => true, 'room' => $rooms], 200);
    }
}
