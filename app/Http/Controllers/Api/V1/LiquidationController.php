<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Liquidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LiquidationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $liquidation = Http::withBasicAuth('EMPCAR01', 'EMPCAR1')->post(env('API_LIQUIDATION'), [
                        "ciudad_origen" => $request->Destinatario['idDestinatario'],
                        "ciudad_destino" => $request->Destinatario['idLocalidad'],
                        "cod_formapago" => $request->IdFormaPago,
                        "cod_servicio" => $request->IdServicio,
                        'valorproducto' => $request->ValorProducto,
                        "info_cubicacion" => [
                            [
                                "cantidad" => $request->NumeroPieza,
                                "largo" => $request->Largo,
                                "ancho" => $request->Ancho,
                                "alto" => $request->Alto,
                                "peso" => $request->Peso,
                                "declarado" => $request->ValorDeclarado
                            ]
                        ]
                    ])->json();
                    
            if ($liquidation) {
                return response()->json([
                    'data' => $liquidation
                ], 200);
            }
        } catch (\Throwable $th) {
            throw $th;
        }

    }
}
