<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\GuideController as GuideV1;
use App\Http\Controllers\Api\V1\LiquidationController;
use App\Http\Controllers\Api\V1\QuerieController;

// V1
Route::apiResource('v1/guide_envia', GuideV1::class)
    ->only(['store', 'downloadPDF']);
    
Route::apiResource('v1/liquidation', LiquidationController::class)
    ->only('store');

Route::apiResource('v1/querie', QuerieController::class)
    ->only('show');