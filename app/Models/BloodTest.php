<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'donation_id',
        'test_date',
        'hiv_test',
        'hepatitis_test',
        'syphilis_test',
        'htlv_test',
        'malaria_test',
    ];

    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }
}