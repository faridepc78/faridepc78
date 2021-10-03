<?php

namespace App\Responses;

use Illuminate\Http\Response;

class AjaxResponses
{
    public static function LikeSuccessResponse()
    {
        return response()->json(['message' => 'عملیات با موفقیت انجام شد.', 'status' => 'like'], Response::HTTP_OK);
    }

    public static function DisLikeSuccessResponse()
    {
        return response()->json(['message' => 'عملیات با موفقیت انجام شد.', 'status' => 'dislike'], Response::HTTP_OK);
    }

    public static function SuccessResponse()
    {
        return response()->json(['message' => 'عملیات با موفقیت انجام شد.', 'status' => 'success'], Response::HTTP_OK);
    }

    public static function FailedResponse()
    {
        return response()->json(['message' => 'عملیات با شکست مواجه شد'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
