<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function get(Request $request) {
        $response = ['success' => false, 'msg' => 'No record found'];

        $getAll = DB::table('levels')->get();
        $data = [];
        foreach ($getAll as $all) {
            $data[] = [
                'id'    => $all->id,
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
        	if (DB::table('levels')->insert([
        		'title'       => $request->title,
        		'description' => is_null($request->description) ? '' : $request->description
        	])) {
        		return response()->json(['success' => true, 'msg' => 'Levels successfully added'], 200);
        	}
        }
    }
}
