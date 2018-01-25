<?php

namespace App\Helpers;

use Illuminate\Http\Response;

class ResponseMessage
{
    public static function ok($data) {
        return response()->json($data, Response::HTTP_OK);
    }

    public static function noContent() {
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public static function created($resource) {
        return response()->json($resource, Response::HTTP_CREATED);
    }

    public static function error($message) {
        return response()->json(['error' => $message], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public static function validationError($message) {
        return response()->json(['error' => $message], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public static function forbidden() {
        return response()->json(['error' => __('Permission denied on request')], Response::HTTP_FORBIDDEN);
    }

    public static function notFound() {
        return response()->json(['error' => 'Requested resource is not found'], Response::HTTP_NOT_FOUND);
    }

    public static function badRequest() {
        return response()->json(['error' => 'Bad request'], Response::HTTP_BAD_REQUEST);
    }
}