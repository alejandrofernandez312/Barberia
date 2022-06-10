<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Servicio;
use App\Models\Usuario;
use App\Models\Reseña;

class Factura extends Model
{
    //
    protected $table = "factura_barberia";
    protected $primaryKey = "factura_id";
    public $timestamps = false;


    /**
     * Asocia la factura con el servicio
     *
     * @return void
     */
    public function Servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }

    /**
     * Asocia la factura con el cliente
     *
     * @return void
     */
    public function Usuario()
    {
        return $this->belongsTo(Usuario::class, 'cliente_id');
    }

     /**
     * Asocia la factura con la reseña
     *
     * @return void
     */
    public function Reseña()
    {
        return $this->belongsTo(Reseña::class, 'reseña_id');
    }
}
