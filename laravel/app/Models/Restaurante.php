<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    public function setNombreAttribute($nombre)
    {
        $this->attributes['nombre'] = $nombre;
    }

    public function setEstatusAttribute($estatus)
    {
        $this->attributes['estatus'] = $estatus;
    }

    public function getIdAttribute()
    {
        return $this->attributes['id'];
    }

    public function getNombreAttribute()
    {
        return strtoupper($this->attributes['nombre']);
    }

    public function getCierreAttribute()
    {
        return $this->attributes['cierre'];
    }

    public function getCierreOriginalAttribute()
    {
        return $this->attributes['cierre_or'];
    }

    public function getAperturaAttribute()
    {
        return $this->attributes['apertura'];
    }

    public function getAperturaOriginalAttribute()
    {
        return $this->attributes['apertura_or'];
    }

    public function getEstatusAttribute()
    {
        return $this->attributes['estatus'];
    }

    public static function closeRes($fecha)
    {
       $query = "CALL restaurantes_cerrados(?)";
       return Restaurante::hydrate(DB::select($query, array($fecha)));
    }

    public static function abrirClosRes($tipo, $idres, $cierre, $apertura)
    {
       $query = "CALL cerrar_abrir_rest(?, ?, ?, ?)";
       return Restaurante::hydrate(DB::select($query, array($tipo, $idres, $cierre, $apertura)));
    }

    public static function estatusRes($idres)
    {
       $query = "CALL estatus_rest(?)";
       return Restaurante::hydrate(DB::select($query, array($idres)));
    }

    public static function allRestaurantes()
    {
       $query = "CALL todos_restaurantes()";
       return Restaurante::hydrate(DB::select($query));
    }
}
