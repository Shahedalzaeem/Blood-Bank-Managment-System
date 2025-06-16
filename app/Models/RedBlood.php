<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class RedBlood extends Model
{

    use SoftDeletes;
    
    protected $fillable = ['blood_type', 'rhesus_factor', 'quantity', 'original_date', 'expiration_timer'];
}