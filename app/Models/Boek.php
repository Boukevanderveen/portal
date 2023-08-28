<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boek extends Model
{
    use HasFactory;

        // "boeken" is de naam van de table in de database 
        protected $table = 'boeken';

        protected $fillable = [
            'omschrijving',
            'isbn',
            'prijs',
            'leerjaar',
        ];
}
