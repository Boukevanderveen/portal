<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'school_years',
        'period',
        'week',
        'date',
        'time',
        'resit_date',
        'resit_time',
        'registerable',

    ];
  
    public function registrations()
    {
        return $this->hasMany(Test_User::class);
    }
}
