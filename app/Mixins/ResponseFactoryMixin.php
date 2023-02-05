<?php

namespace App\Mixins;

use Illuminate\Http\JsonResponse;

class ResponseFactoryMixin
{
    public function successJson()
    {
        return function($data){
            return [
                'success'=> true,
                'data' => $data,
                'message' => 'ok'
            ];
        };
    }

    public function errorJson()
    {
        return function($message, $status, $errors = null, $data = null){
            $data = [
                'success' => false,
                'message' => $message,
                'errors' => $errors,
                'data' => $data
            ];
            return new JsonResponse($data, $status);
        };
    }
}
