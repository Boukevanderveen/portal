<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'practical_hours',
        'theory_hours',
        'selfstudy_hours',
        'teacher',
        'period',
    ];
}
