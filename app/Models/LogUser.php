<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class LogUser extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'full_name', 'username', 'password', 'role',
    ];

    protected $hidden = [
        'password',
    ];
}