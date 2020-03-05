<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class EnrollmentController extends Controller
{
    public function getByToken($token) {
    	$data = DB::table('school_years')->where('token', $token)->where('online_enrollment', 1)->first();

    	return response()->json(['success' => true, 'data' => $data], 200);
    }
}
