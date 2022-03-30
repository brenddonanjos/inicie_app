<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function empty()
    {
       return response()->json([ 'data' => [] ]);
    }

    public function success($message, $body, $httpcode)
    {
        return  response()->json([
            'success' => true,
            'msg' => $message,
            'body' => $body
        ],$httpcode);
    }
    public function error($error, $httpcode)
    {
        return  response()->json([
            'success' => false,
            'error' => $error
        ], $httpcode);
    }
}
