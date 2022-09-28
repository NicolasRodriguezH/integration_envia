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
            'IdPreenvio' => $this->liquidation->id,
            'numeroPreenvio' => $this->liquidation->numeroPreenvio,
            'fechaVencimineto' => $this->liquidation->fechaVencimineto,
            'fechaCreacion' => $this->liquidation->fechaCreacion,
            'valorFlete' => $this->liquidation->valorFlete,
            'valorSobreFlete' => $this->liquidation->valorSobreFlete,
            'valorServicioContrapago' => $this->liquidation->valorServicioContrapago
        ];
    }
}
