<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RapiRadicado extends Model
{

    protected $fillable = ['numero_de_folios', 'codigo_rapi_radicado'];

    public function guide() {
        return $this->hasOne(Guide::class);
    }

    use HasFactory;
}
