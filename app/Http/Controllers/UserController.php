<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Models\User;
use App\Traits\APIResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use APIResponse;

    public function index(){
        $data = Student::all();
        $res = StudentResource::collection($data);
        return $this->successResponse($res,201);
    }

    public function single(){
        $data = Student::find(1);
         $res = new StudentResource($data);
        return $this->successResponse($res,200);
    }

    public function post(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(),405);
        }

        return "ok";
    }
}
