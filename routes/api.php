<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\GuideController as GuideV1;

use function Ramsey\Uuid\v1;

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

// V1
Route::apiResource('v1/guide_envia', GuideV1::class)
    ->only(['store', 'index', 'show'])
    ->middleware('auth:sanctum');