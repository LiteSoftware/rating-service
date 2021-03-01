<?php

namespace App\Http\Controllers\Interfaces;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface RatingControllerInterface
{
    public function addResult(Request $request): JsonResponse;

    public function getRating(Request $request) : JsonResponse;
}
