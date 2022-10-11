<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    protected $guarded = ['id', 'timestamps'];

    /* public function liquidation() {
        return $this->hasOne(Liquidation::class);
    } */

    public function receiver() {
        return $this->hasOne(Receiver::class);
    }

    public function rapiRadicado() {
        return $this->hasOne(RapiRadicado::class);
    }

    use HasFactory;
}
