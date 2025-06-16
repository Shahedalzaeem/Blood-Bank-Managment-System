<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalJoinRequest extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'hospital_name',
        'username',
        'password',
    ];

    protected $dates = ['request_date'];
}