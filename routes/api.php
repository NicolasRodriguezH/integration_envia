<?php

use App\Http\Controllers\Api\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\GuideController as GuideV1;
use App\Http\Controllers\Api\V1\LiquidationController;
use Illuminate\Routing\RouteGroup;

Route::group([

]);
// V1
Route::apiResource('v1/guide_envia', GuideV1::class)
    ->only(['store', 'show']);
    //->middleware('auth:sanctum')
Route::apiResource('v1/liquidation', LiquidationController::class)
    ->only('store');