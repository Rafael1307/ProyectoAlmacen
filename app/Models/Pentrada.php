<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pentrada
 *
 * @property $id
 * @property $idEntrada
 * @property $idProducto
 * @property $cantidad
 * @property $created_at
 * @property $updated_at
 *
 * @property Entrada $entrada
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pentrada extends Model
{
    
    static $rules = [
		'idEntrada' => 'required',
		'idProducto' => 'required',
		'cantidad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idEntrada','idProducto','cantidad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function entrada()
    {
        return $this->hasOne('App\Models\Entrada', 'id', 'idEntrada');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'idProducto');
    }
    

}
