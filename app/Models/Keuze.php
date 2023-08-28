<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuze extends Model
{
    use HasFactory;

    // "keuzedelen" is de naam van de table in de database 
    protected $table = 'keuzedelen';

    protected $fillable = [
        'code',
        'titel',
        'uren',
        'omschrijving',
        'docent',
        'periode',
    ];
}