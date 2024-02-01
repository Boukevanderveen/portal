<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubProject extends Model
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

    public function users()
    {
        return $this->belongsToMany(User::class, 'sub_projects_users', 'sub_project_id', 'user_id');
    }
    

}
