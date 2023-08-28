<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uitje extends Model
{
    use HasFactory;

        //uitjes is de naam van de table in de database 
        protected $table = 'uitjes';

        protected $fillable = [
            'leerjaar',
            'datum',
            'tijdstip',
            'locatie',
            'onderwerp',
        ];
}
