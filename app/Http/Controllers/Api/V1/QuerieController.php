<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuerieController extends Controller
{
    public function show($id)
    {        
        try {
            $api_querie = Http::withBasicAuth('EMPCAR01', 'EMPCAR1')->get(env('API_QUERIE').$id)->json();
            
            return response()->json([
                $api_querie
            ], 200);

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
