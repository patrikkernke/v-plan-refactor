<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'can_login',
        'can_manage_digital_board',
        'can_manage_users',
        'can_be_chairman_at_public_meetings',
        'can_be_watchtower_reader',
        'can_be_service_meetings_leader',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'can_login',
        'can_manage_users',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at'                  => 'datetime',
        'can_login'                          => 'boolean',
        'can_manage_digital_board'           => 'boolean',
        'can_manage_users'                   => 'boolean',
        'can_be_chairman_at_public_meetings' => 'boolean',
        'can_be_watchtower_reader'           => 'boolean',
        'can_be_service_meetings_leader'     => 'boolean',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['can'];

    /**
     * Determine if the user has permissions.
     *
     * @return array
     */
    public function getCanAttribute() :array
    {
        return [
            'login' => (bool) $this->attributes['can_login'],
            'manageUsers' => (bool) $this->attributes['can_manage_users'],
            'manageDigitalBoard' => (bool) $this->attributes['can_manage_digital_board']
        ];
    }
}
