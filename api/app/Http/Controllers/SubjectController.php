<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function get(Request $request) {
        $response = ['success' => false, 'msg' => 'No record found'];

        $getAll = DB::table('subjects')->get();
        $data = [];
        foreach ($getAll as $all) {
            $data[] = [
                'id'    		=> $all->id,
                'code' 			=> $all->code,
                'title' 		=> $all->title,
                'description' 	=> $all->description
            ];
        }

        return response()->json(['success' => true, 'data' => $data], 200);
    }

    public function create(Request $request) {

    	$validation = Validator::make($request->json()->all(), [
            'title' => 'required',
            'code' => 'required',
        ]);

		$return = [];
        if($validation->fails()){
        	$errors = $validation->errors();
			return response()->json(['success' => false, 'error' => $errors->toJson()], 200);
        } else {
        	if (DB::table('subjects')->insert([
        		'code' 			=> $request->code,
        		'title' 		=> $request->title,
        		'description' 	=> $request->description == "" ? '' : $request->description
        	])) {
        		return response()->json(['success' => true, 'msg' => 'Subject successfully added'], 200);
        	}
        }
    }
}
