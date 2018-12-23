<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Reservaciones extends Model
{
    public $timestamps = false;
    
    public function setFolioAttribute($folio)
    {
        $this->attributes['folio'] = $folio;
    }

    public function setCuartoAttribute($cuarto)
    {
        $this->attributes['cuarto'] = $cuarto;
    }

    public function setNombreAttribute($nombre)
    {
        $this->attributes['nombre'] = strtoupper($nombre);
    }

    public function setIdRestauranteAttribute($id_restaurante)
    {
        $this->attributes['id_restaurante'] = $id_restaurante;
    }

    public function setIdMesaAttribute($id_mesa)
    {
        $this->attributes['id_mesa'] = substr($id_mesa, 1);
    }

    public function setIdHorarioAttribute($id_horario)
    {
        $this->attributes['id_horario'] = $id_horario;
    }

    public function setFechaAttribute($fecha)
    {
        $this->attributes['fecha'] = $fecha;
    }

    public function setComentariosAttribute($comentarios)
    {
        $this->attributes['comentarios'] = strtoupper($comentarios);
    }

    public function setEstatusAttribute($estatus)
    {
        $this->attributes['estatus'] = $estatus;
    }

    public function setFechaReservaAttribute($fecha_reserva)
    {
        $this->attributes['fecha_reserva'] = $fecha_reserva;
    }

    public function setOperadorAttribute($operador)
    {
        $this->attributes['operador'] = $operador;
    }

    public function getIdAttribute()
    {
        return $this->attributes['id'];
    }

    public function getRestauranteAttribute()
    {
        return strtoupper($this->attributes['nombre_restaurante']);
    }

    public function getHoraAttribute()
    {
        return $this->attributes['hora'] . ' P.M.';
    }

    public function getFechaAttribute()
    {
        return $this->attributes['fecha'];
    }

    public function getNumeroAttribute()
    {
        return $this->attributes['numero'];
    }

    public function getCapacidadAttribute()
    {
        return $this->attributes['capacidad'] . ' PAX';
    }

    public function getCuartoAttribute()
    {
        return $this->attributes['cuarto'];
    }

    public function getFolioAttribute()
    {
        return $this->attributes['folio'];
    }

    public function getNombreAttribute()
    {
        return $this->attributes['nombre'];
    }

    public function getComentariosAttribute()
    {
        return $this->attributes['comentarios'];
    }

    public function getIdRestauranteAttribute()
    {
        return $this->attributes['id_restaurante'];
    }

    public function getIdMesaAttribute()
    {
        return $this->attributes['id_mesa'];
    }

    public function getIdHorarioAttribute()
    {
        return $this->attributes['id_horario'];
    }

    public function getEstatusAttribute()
    {
        return $this->attributes['estatus'];
    }

    public function getFechaReservaAttribute()
    {
        return $this->attributes['fecha_reserva'];
    }

    public function getOperadorAttribute()
    {
        return $this->attributes['operador'];
    }

    public function getNombreOpeAttribute()
    {
        return strtoupper($this->attributes['nombre_ope'].' '.$this->attributes['apellido']);
    }

    public static function buscar()
    {
        $query = "CALL busquedas()";
        return Reservaciones::hydrate(DB::select($query));
    }

    public static function reportes($idres, $fecha)
    {
        $query = "CALL reportes(?, ?)";
        return Reservaciones::hydrate(DB::select($query, array($idres, $fecha)));
    }

    public static function tickets($id)
    {
        $query = "CALL tickets(?)";
        return Reservaciones::hydrate(DB::select($query, array($id)));
    }
}
