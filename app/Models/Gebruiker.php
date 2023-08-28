<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gebruiker extends Model
{
    use HasFactory;

        // "users" is de naam van de table in de database 
        protected $table = 'users';

        protected $fillable = [
            'name',
        ];
}
