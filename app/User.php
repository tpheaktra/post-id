<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait; // add this trait to your user model

    protected $table = 'users';
    protected $fillable = [
        'name','phone','email','record_status', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function user_group(){
        return $this->belongsToMany(PermissionGroup::class, 'user_group', 'user_id', 'group_id');
    }

    public function permission_group(){
        return $this->belongsToMany(PermissionGroup::class, 'permissions', 'group_id', 'id');
    }
}
