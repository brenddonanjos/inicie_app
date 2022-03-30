<?php

namespace App\WebServices;

class WebService
{
    public function empty()
    {
        return (object)['data' => []];
    }

    public function success($message, $body)
    {
        return  (object)[
            'success' => true,
            'msg' => $message,
            'body' => $body
        ];
    }
    public function error($error)
    {
        return  (object)[
            'success' => false,
            'error' => $error
        ];
    }
}
