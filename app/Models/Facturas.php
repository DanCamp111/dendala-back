<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    use HasFactory;

    protected $fillable = ['id_cliente', 'fecha', 'monto', 'observaciones'];

    public function cliente() {
        return $this->belongsTo(User::class, 'id_cliente');
    }
}
