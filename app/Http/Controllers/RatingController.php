<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\RatingControllerInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RatingController extends Controller implements RatingControllerInterface
{
    public function addResult(Request $request): JsonResponse
    {
//        Add result test device performance
        return response()->json([
            'message' => 'Performance metrics added'
        ], 200);
    }

    public function getRating(Request $request) : JsonResponse {
//        Get rating table
        return response()->json([
            'message' => 'view rating'
        ], 200);
    }
}
