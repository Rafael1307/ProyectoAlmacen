<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Psalida
 *
 * @property $id
 * @property $idSalida
 * @property $idProducto
 * @property $cantidad
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto $producto
 * @property Salida $salida
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Psalida extends Model
{
    
    static $rules = [
		'idSalida' => 'required',
		'idProducto' => 'required',
		'cantidad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idSalida','idProducto','cantidad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'idProducto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function salida()
    {
        return $this->hasOne('App\Models\Salida', 'id', 'idSalida');
    }
    

}
