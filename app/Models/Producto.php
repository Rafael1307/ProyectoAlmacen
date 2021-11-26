<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Producto
 *
 * @property $id
 * @property $foto
 * @property $Nombre
 * @property $Marca
 * @property $Precio
 * @property $Descripcion
 * @property $catId
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property Pentrada[] $pentradas
 * @property Psalida[] $psalidas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    use SoftDeletes;
    
    static $rules = [
		'foto' => 'required|mimes:jpeg,png,jpg',
		'Nombre' => 'required',
		'Marca' => 'required',
		'Precio' => 'required',
		'Descripcion' => 'required',
		'catId' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['foto','Nombre','Marca','Precio','Descripcion','catId'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'catId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pentradas()
    {
        return $this->hasMany('App\Models\Pentrada', 'idProducto', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function psalidas()
    {
        return $this->hasMany('App\Models\Psalida', 'idProducto', 'id');
    }
    

}
