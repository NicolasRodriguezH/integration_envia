<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class GuideController extends Controller
{
    public function store(Request $request)
    {
        
        try {
            $generate = Http::withBasicAuth('EMPCAR01', 'EMPCAR1')->post(env('API_GENERATE'), [
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
                    ],
                    "cod_regional_cta" => 1,
                    "cod_oficina_cta" => 1,
                    "cod_cuenta" => 30,
                    "info_destino" => [
                        "nom_destinatario" => $request->Destinatario['nombre'],
                        "dir_destinatario" => $request->Destinatario['direccion'],
                        "tel_destinatario" => $request->Destinatario['telefono'],
                        "ced_destinatario" => $request->Destinatario['numeroDocumento']
                    ],
                    "info_contenido" => [
                        "dice_contener" => $request->DiceContener,
                    ]
                ])->json();
                
                if ($generate) {
                return response()->json([
                    //'respuesta' => $generate['respuesta'],
                    //'kilos cobrados' => $generate['k_cobrados'],
                    //'valor flete' => $generate['valor_flete'],
                    //'valor costom' =>  $generate['valor_costom'],
                    //'valor otros' => $generate['valor_otros'],
                    //'dias_entrega' => $generate['dias_entrega'],}
                    //'guia' => $generate['guia'],

                    'pdf guia' => $generate['urlguia'],

                    //'num ordens' => $generate['num_ordens'],
                    //'cod postaldestino' => $generate['cod_postaldestino'],
                    //'bt64' => $generate['bt64'],
                ], 201);
            }
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
