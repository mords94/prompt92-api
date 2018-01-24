<?php

namespace App\Helpers;

use Illuminate\Http\Response;

class ResponseMessage
{
    public static function ok($data) {
        return response($data, Response::HTTP_OK);
    }

    public static function noContent() {
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public static function created($resource) {
        return response($resource, Response::HTTP_CREATED);
    }

    public static function error(String $message) {
        return response(['error' => $message], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public static function notFound() {
        return response(['error' => 'Requested resource is not found'], Response::HTTP_NOT_FOUND);
    }
}