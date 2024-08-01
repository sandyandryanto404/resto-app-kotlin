<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    protected function errorResponse($message, $errors = null, $code = 422) {
        return response()->json([
            'errors' => $errors,
            'data' => null,
            'message' => $message == null && is_string($errors) ? $errors : $message,
            'status' => 'error'
        ], $code);
    }

    protected function successResponse($message, $data = null, $code = 200) {
        return response()->json([
            'errors' => null,
            'data' => $data,
            'message' => $message,
            'status' => 'success'
        ], $code);
    }
}   