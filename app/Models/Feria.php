<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feria extends Model
{
    // 1) Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha',
    ];

    // 2) Aquí indicamos que 'fecha' debe convertirse a un objeto Carbon
    protected $casts = [
        'fecha' => 'date',  // si necesitas hora, usa 'datetime'
    ];

    /**
     * Relación muchos-a-muchos con Emprendedor
     */
    public function emprendedores()
    {
        return $this->belongsToMany(
            Emprendedor::class,
            'feria_emprendedor',
            'feria_id',
            'emprendedor_id'
        );
    }
}
