<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadBlood extends Model
{
    protected $fillable = ['component_type', 'blood_type', 'rhesus_factor', 'quantity'];
}
