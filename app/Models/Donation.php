<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_id',
        'donation_date',
        'weight',
        'blood_type',
        'rhesus_factor',
        'hemoglobin',
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    public function bloodTest()
    {
        return $this->hasOne(BloodTest::class);
    }
}