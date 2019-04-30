<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'password',
    ];

    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';

    /**
     * Check if admin
     *
     * @return boolean Status
     */
    public function isAdmin()
    {
        return $this->type === self::ADMIN_TYPE;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Return related mixes
     *
     * @return Relationship Mixes
     */
    public function mixes()
    {
        return $this->hasMany('App\Models\Mix');
    }

    /**
     * Return related user
     *
     * @return Relationship User
     */
    public function user()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
