<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toets extends Model
{
    use HasFactory;

        // "toetsen" is de naam van de table in de database 
        protected $table = 'toetsen';

        protected $fillable = [
            'leerjaar',
            'periode',
            'toets',
            'datum',
            'tijdstip',
            'herkansing',
            'herTijdstip',
        ];
}
