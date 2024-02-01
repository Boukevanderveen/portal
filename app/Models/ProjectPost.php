<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'intro',
        'description',
        'project',
        'picture'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
