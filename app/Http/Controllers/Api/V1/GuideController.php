<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use App\Models\RapiRadicado;
use App\Models\Receiver;
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
                        "dice_contener" => $request->DiceContener
                    ]
                ])->json();
                
            $guide = new Guide();
            $guide->id_cliente_credito = $request->IdClienteCredito;
            $guide->codigo_convenio_remitente = $request->CodigoConvenioRemitente;
            $guide->id_tipo_entrega = $request->IdTipoEntrega;
            $guide->aplica_contrapago = $request->AplicaContrapago;
            $guide->id_servicio = $request->IdServicio;
            $guide->peso = $request->Peso;
            $guide->largo = $request->Largo;
            $guide->ancho = $request->Ancho;
            $guide->alto = $request->Alto;
            $guide->dice_contener = $request->DiceContener;
            $guide->valor_declarado = $request->ValorDeclarado;
            $guide->id_tipo_envio = $request->IdTipoEnvio;
            $guide->id_forma_pago = $request->IdFormaPago;
            $guide->numero_pieza = $request->NumeroPieza;
            $guide->descripcion_tipo_entrega = $request->DescripcionTipoEntrega;
            $guide->nombre_tipo_envio = $request->NombreTipoEnvio;
            $guide->codigo_convenio = $request->CodigoConvenio;
            $guide->id_sucursal = $request->IdSucursal;
            $guide->id_cliente = $request->IdCliente;
            $guide->observaciones = $request->Observaciones;
                        
            $guide->save();
            
            $receiver = new Receiver();
            $receiver->tipo_documento = $request->Destinatario['tipoDocumento'];
            $receiver->numero_documento = $request->Destinatario['numeroDocumento'];
            $receiver->nombre = $request->Destinatario['nombre'];
            $receiver->primer_apellido = $request->Destinatario['primerApellido'];
            $receiver->segundo_apellido = $request->Destinatario['segundoApellido'];
            $receiver->telefono = $request->Destinatario['telefono'];
            $receiver->direccion = $request->Destinatario['direccion'];
            $receiver->id_destinatario = $request->Destinatario['idDestinatario'];
            $receiver->id_remitente = $request->Destinatario['idRemitente'];
            $receiver->id_localidad = $request->Destinatario['idLocalidad'];
            $receiver->codigo_convenio = $request->Destinatario['CodigoConvenio'];
            $receiver->convenio_destinatario = $request->Destinatario['ConvenioDestinatario'];
            $receiver->correo = $request->Destinatario['correo'];
            $receiver->guide_id = $guide->id;
            
            $receiver->save();
            
            $rapiradicado = new RapiRadicado();
            $rapiradicado->numero_de_folios = $request->RapiRadicado['numerodeFolios'];
            $rapiradicado->codigo_rapi_radicado = $request->RapiRadicado['CodigoRapiRadicado'];
            $rapiradicado->guide_id = $guide->id;
    
            $rapiradicado->save();

            if ($generate) {
                return response()->json([
                    'data' => $generate
                ], 201);   
            }
            
        } catch (\Throwable $th) {
            throw $th;
        }

    }
    
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
