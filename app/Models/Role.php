<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @property $id
 * @property $rol
 * @property $created_at
 * @property $updated_at
 *
 * @property Userrole[] $userroles
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Role extends Model
{
    
    static $rules = [
		'rol' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['rol'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userroles()
    {
        return $this->hasMany('App\Models\Userrole', 'idRol', 'id');
    }
    

}
