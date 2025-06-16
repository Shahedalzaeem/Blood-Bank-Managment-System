<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = false; // إذا لم يكن هناك created_at و updated_at
}