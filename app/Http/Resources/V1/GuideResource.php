<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Guide;
use App\Models\Liquidation;

class GuideResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'Destinatario' => [
            'IdPreenvio' => $this->id,
            'numeroPreenvio' => $this->numeroPreenvio,
            'fechaVencimineto' => $this->fechaVencimineto,
            'fechaCreacion' => $this->fechaCreacion,
            'valorFlete' => $this->valorFlete,
            'valorSobreFlete' => $this->valorSobreFlete,
            'valorServicioContrapago' => $this->valorServicioContrapago
            ]
        ];
    }
}
