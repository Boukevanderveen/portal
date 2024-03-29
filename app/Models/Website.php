<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'isPublic',
        'user_id',
        'picture'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
