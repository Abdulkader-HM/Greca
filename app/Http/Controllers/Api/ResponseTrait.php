<?php

namespace App\Http\Controllers\Api;

trait ResponseTrait
{
    public function successResponse($data = null, $message = null, $status = null)
    {
        $array = [
            'data' => $data,
            'message' => $message,
            'status' => $status
        ];
        return response()->json($array, $status);
    }

    public function errorResponse($error,$errorMessage=[],$status)
    {
        $array=[
            'data'=>$error,
            'success'=>false,
            'status'=>$status

        ];
        if(!empty($errorMessage))
        {
            $array['data']=$errorMessage;
        }
        return response()->json($array,$status);
    }
}
