<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    protected $fillable = [
        'hospital_name', 'blood_component', 'blood_type', 'rhesus_factor', 'quantity', 'request_date' , 'status'
    ];
}
