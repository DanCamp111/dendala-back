<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Polizas extends Model
{
    protected $table = 'polizas';
    protected $fillable = [
        'total_horas',
        'fecha_inicio',
        'fecha_fin',
        'precio',
        'id_cliente',
        'observaciones'
    ];

    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'id_cliente');
    }
}
