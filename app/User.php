<?php
namespace App;
use App\model\HealthFacilities;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait; // add this trait to your user model

    protected $table = 'users';
    protected $fillable = [
        'name','username','dob',
        'date_join','profile','phone',
        'email','record_status',
        'password','address',
        'last_login_at','last_login_ip',
        'hos_base'
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

    public function health_facilities(){
        return $this->hasOne(HealthFacilities::class,'code','hos_base');
    }
}
