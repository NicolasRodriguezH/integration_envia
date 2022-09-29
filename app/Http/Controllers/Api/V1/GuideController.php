<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/* Recurso individual */
use App\Http\Resources\V1\GuideResource;
/* Inde la collction */
use App\Http\Controllers\Resources\V1\GuideCollection;
use App\Http\Resources\V1\LiquidationResource;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $guide = Guide::latest()->liquidation;
        return new GuideResource($guide); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guide = new Guide($request->all());
        $guide->save();

        $request->header('x-app-security_token');

        $liquidation = Http::post(env('API_LIQUIDATION'))->json();

        return response()->json([
            'data' => $liquidation,
            'res' => new GuideResource($guide),
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function show(Guide $guide)
    {
        /* $api_guide = env("API_GUIDE");
        $guide = Http::get($api_guide); */
        /* $guideAsArray = $guide->json();
        return $guideAsArray; */
    }
}
