<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cliente',
        'id_tecnico',
        'fecha',
        'horas',
        'observaciones',
        'id_poliza',
        'id_factura'
    ];

    public function cliente()
    {
        return $this->belongsTo(User::class, 'id_cliente');
    }

    public function tecnico()
    {
        return $this->belongsTo(User::class, 'id_tecnico');
    }

    public function poliza()
    {
        return $this->belongsTo(Polizas::class, 'id_poliza');
    }

    public function factura()
    {
        return $this->belongsTo(Facturas::class, 'id_factura');
    }
}
