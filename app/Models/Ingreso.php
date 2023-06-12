<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;
    protected $table="ingreso";
    //llave foranea
    public function vehiculo()
    {
        return $this->belongTo(vehiculo::class, 'id_vehiculo');
    }
    //llave foranea
    public function sitio()
    {
        return $this->belongsTo(sitio::class);
    }
    //llave foranea
    public function sitio_emergencia()
    {
        return $this->belongsTo(sitio_emergencia::class);
    }
    //Realcion uno a uno
    public function salida(){
    return $this->hasOne('App\Models\salida');
    }
}

