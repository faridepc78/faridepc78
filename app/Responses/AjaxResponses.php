<?php

namespace App\Responses;

use Illuminate\Http\Response;

class AjaxResponses
{
    public static function LikeSuccessResponse(): \Illuminate\Http\JsonResponse
    {
        return response()->json(['message' => 'عملیات با موفقیت انجام شد.', 'status' => 'like'], Response::HTTP_OK);
    }

    public static function DisLikeSuccessResponse(): \Illuminate\Http\JsonResponse
    {
        return response()->json(['message' => 'عملیات با موفقیت انجام شد.', 'status' => 'dislike'], Response::HTTP_OK);
    }

    public static function SuccessResponse(): \Illuminate\Http\JsonResponse
    {
        return response()->json(['message' => 'عملیات با موفقیت انجام شد.', 'status' => 'success'], Response::HTTP_OK);
    }

    public static function FailedResponse(): \Illuminate\Http\JsonResponse
    {
        return response()->json(['message' => 'عملیات با شکست مواجه شد'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
