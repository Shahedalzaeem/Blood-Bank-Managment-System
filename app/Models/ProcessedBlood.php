<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProcessedBlood extends Model
{

    use SoftDeletes;
    
    protected $fillable = ['blood_unit_id', 'quantity'];

    public function bloodUnit()
    {
        return $this->belongsTo(BloodUnit::class);
    }
}