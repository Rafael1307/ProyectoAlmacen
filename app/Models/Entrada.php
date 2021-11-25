<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Entrada
 *
 * @property $id
 * @property $fecha
 * @property $hora
 * @property $created_at
 * @property $updated_at
 *
 * @property Pentrada[] $pentradas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Entrada extends Model
{
    
    static $rules = [
		'fecha' => 'required',
		'hora' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','hora'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pentradas()
    {
        return $this->hasMany('App\Models\Pentrada', 'idEntrada', 'id');
    }
    

}
