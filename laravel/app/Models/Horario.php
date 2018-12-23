<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Horario extends Model
{
    public function getIdAttribute()
    {
        return $this->attributes['id'];
    }

    public function getHoraAttribute()
    {
        return $this->attributes['hora'] . ' PM';
    }

    public function getIdRestauranteAttribute()
    {
        return $this->attributes['id_restaurante'];
    }

    public static function hoario12($restaurante)
    {
        $query = "CALL horarios_12(?)";
        return Horario::hydrate(DB::select($query, array($restaurante)));
    }
}
