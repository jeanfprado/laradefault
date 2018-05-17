<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Role.
 *
 * @package namespace App\Models;
 */
class Role extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'title'
    ];

    /**
     * Relacionamento muito para muito entre Role e User com tabela de relacionamento role_users
     *
     * @var array
     */
    public function user()
    {
        return $this->belongsToMany(User::class,'user_has_roles','role_id', 'user_id');
    }

    public function permission()
    {
        return $this->belongsToMany(Permission::class,'role_has_permissions','role_id', 'permission_id');
    }

}
