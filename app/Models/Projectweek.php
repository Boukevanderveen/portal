<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projectweek extends Model
{
    protected $table = 'projectweeks';
    use HasFactory;

    protected $fillable = [
        'name',
        'period',
        'week',
        'start_date',
        'end_date',
        'target_class',
        'registerable',
    ];
}
