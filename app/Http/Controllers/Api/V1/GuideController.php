<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/* Recurso individual */
use App\Http\Controllers\Resources\V1\GuideResource;
/* Inde la collction */
use App\Http\Controllers\Resources\V1\GuideCollection;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $api_guide = env("API_GUIDE");
        $guide = Http::get($api_guide);
        $guideAsArray = $guide->json();
        return $guideAsArray;
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
        $liquidation = $guide->liquidation();
        
        /* return (Http::withHeaders([
            'x-app-signature' => '',
            'x-app-security_token' => ''
        ])->post(env('API_LIQUIDATION'))->response()->json([
            'res' => 'Guia registrada',
            'data' => "Aqui iria data"
        ], 200)); */

        
        $liquidation = Http::withHeaders([
            'x-app-signature' => '',
            'x-app-security_token' => ''
        ])->post(env('API_LIQUIDATION'))->json();
        return response()->json([
            'res' => 'Guia registrada',
            'data' => $liquidation
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
        $api_guide = env("API_GUIDE");
        $guide = Http::get($api_guide);
        $guideAsArray = $guide->json();
        return $guideAsArray;
    }
}
