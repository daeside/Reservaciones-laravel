<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Mesas extends Model
{
    public function getIdAttribute()
    {
        return $this->attributes['id'];
    }

    public function getIdReservaAttribute()
    {
        return $this->attributes['id_reserva'];
    }

    public function getNombreAttribute()
    {
        return strtoupper($this->attributes['nombre']);
    }

    public function getCuartoAttribute()
    {
        return $this->attributes['cuarto'];
    }

    public function getFechaAttribute()
    {
        return $this->attributes['fecha'];
    }

    public function getHoraAttribute()
    {
        return $this->attributes['>hora'] . ' PM';
    }

    public function getIdRestauranteAttribute()
    {
        return $this->attributes['id_restaurante'];
    }

    public function getCapacidadAttribute()
    {
        return $this->attributes['capacidad'] . ' PAX';
    }

    public function getEstatusAttribute()
    {
        return $this->attributes['estatus'];
    }

    public function getNumeroAttribute()
    {
        return $this->attributes['numero'];
    }

    public function getNotasAttribute()
    {
        return $this->attributes['comentarios'];
    }

    public function setEstatusAttribute($estatus)
    {
        $this->attributes['estatus'] = $estatus;
    }

    public static function disponibles($idres, $idhor, $fecha)
    {
       $query = "CALL mesas_disponibles(?, ?, ?)";
       return Mesas::hydrate(DB::select($query, array($idres, $idhor, $fecha)));
    }

    public static function ocupadas($idres, $fecha, $idhora)
    {
       $query = "CALL mesas_ocupadas(?, ?, ?)";
       return Mesas::hydrate(DB::select($query, array($idres, $fecha, $idhora)));
    }
}
