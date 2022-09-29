<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liquidation extends Model
{
    protected $guarded = ['IdPreenvio', 'timestamps'];

    /* public function guide() {
        return $this->hasOne(Guide::class);
    } */

    use HasFactory;
}
