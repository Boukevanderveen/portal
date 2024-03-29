<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'intro',
        'description',
        'highlighted',
        'picture'
    ];

    public function subprojects()
    {
        return $this->hasMany(SubProject::class);
    }

    public function projectposts()
    {
        return $this->hasMany(ProjectPost::class);
    }
    
}
