<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodArchive extends Model
{
    protected $fillable = ['blood_type', 'rhesus_factor', 'quantity'];
}