<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;


/**
 * Class User.
 *
 * @package namespace App\Models;
 */
class User extends Authenticatable implements Transformable
{
    use TransformableTrait;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relacionamento muito para muito entre User e Role com tabela de relacionamento role_users
     *
     * @var array
     */

    public function role()
    {
        return $this->belongsToMany(Role::class,'user_has_roles','user_id', 'role_id');
    }

    /**
     * 
     * Verificando se tem permissão 
     */
    public function hasPermission(\App\Models\Permission $permission)
    {
       return $this->hasAnyRoles($permission->role);
    }
    public function hasAnyRoles($roles)
    { 
        // verifica se tem permissões para o papel especificado.
        if ( is_array($roles) || is_object($roles) ){
           return $roles->intersect($this->role)->count() > 0;
        }
        return $this->roles->contains('name', $roles);
    }

}
