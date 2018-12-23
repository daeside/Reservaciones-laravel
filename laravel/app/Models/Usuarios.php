<?php

namespace App\Models;

use DB;
use Hash;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    public $timestamps = false;

    public function setNombreAttribute($nombre)
    {
        $this->attributes['nombre'] = $nombre;
    }

    public function setApellidoAttribute($apellido)
    {
        $this->attributes['apellido'] = $apellido;
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function setPrivilegiosAttribute($privilegios)
    {
        $this->attributes['privilegios'] = $privilegios;
    }

    public function getIdAttribute()
    {
        return $this->attributes['id'];
    }

    public function getNombreAttribute()
    {
        return strtoupper($this->attributes['nombre']);
    }

    public function getApellidoAttribute()
    {
        return strtoupper($this->attributes['apellido']);
    }

    public function getPasswordAttribute()
    {
        return $this->attributes['password'];
    }

    public function getPrivilegiosAttribute()
    {
        return $this->attributes['privilegios'];
    }
}
