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
        'name','email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
