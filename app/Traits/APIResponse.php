<?php

namespace App\Traits;

trait APIResponse
{
    public function successResponse($data =[], $code = 200){
        return response()->json(['data'=>$data,'code'=>$code,'success'=>true],$code);
    }

    public function errorResponse($data =[], $code = 500){
        return response()->json(['data'=>$data,'code'=>$code,'success'=>false],$code);
    }
}
