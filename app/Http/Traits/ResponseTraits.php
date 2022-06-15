<?php

namespace App\Http\Traits;

trait ResponseTraits
{

    public function prepare_response($error = false, $errors = null, $message = '', $data = null, $status = 0, $server_status)
    {
        $array = array(
            'status' => $status,
            'error' => $error,
            'errors' => $errors,
            'message' => $message,
            'data' => $data,
            'server_status' => $server_status,
        );
        return $array;
    }

    public function prepare_response_json($array)
    {
        return response()->json($array);
    }

    public function prepareApiResponse($error = false, $errors = null, $message = null, $data = null,
                                       $status = null, $serverStatus = 403, $code = null, $codeAction = null)
    {
        $info = [
            'status' => $status,
            'message' => $message,
            'error' => $error,
            'errors' => $errors,
//            'server_status' => $serverStatus,
            'code' => $code,
            'code_action' => $codeAction,
            'data' => $data,
        ];
        return response()->json($info, $serverStatus);
    }

}
