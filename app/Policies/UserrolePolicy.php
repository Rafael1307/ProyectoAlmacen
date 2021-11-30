<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use App\Models\Userrole;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserrolePolicy
{
    use HandlesAuthorization;

    public function verifica($userid, $rolid){
        $lista = Userrole::paginate();
        foreach($lista as $elemento){
            if($elemento->idUser == $userid AND $elemento->idRol == $rolid){
                return false;
            }
        }
        return false;
    }

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    
}
