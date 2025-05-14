<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Feria;


class Emprendedor extends Model
{
    // 1) Forzamos el nombre correcto de la tabla
    protected $table = 'emprendedores';

    // 2) Los campos masivos que permitimos
    protected $fillable = ['nombre','email','telefono'];

    // 3) La relación con Feria, indicando el pivot correcto
    public function ferias()
    {
        return $this->belongsToMany(
            Feria::class,
            'feria_emprendedor',   // nombre de tu tabla pivote
            'emprendedor_id',      // clave foránea a esta tabla en la pivote
            'feria_id'             // clave foránea a la otra tabla
        );
    }
}
