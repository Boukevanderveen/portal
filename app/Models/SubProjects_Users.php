<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubProjects_Users extends Model
{

    protected $fillable = [
        'sub_project_id',
        'user_id',
    ];

    protected $table = 'sub_projects_users';
    use HasFactory;
}
