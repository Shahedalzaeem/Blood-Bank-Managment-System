<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donor extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'donor_name', 'mother_name', 'father_name', 'gender', 'donor_identifier', 'address', 'birth_date',
        'phone', 'email', 'record_date', 'smoking', 'alcohol', 'tattoo', 'medical_history',
        'treatment_history', 'surgical_history', 'allergy_info'
    ];
}