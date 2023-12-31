<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projectweek_User extends Model
{
    protected $table = 'projectweeks_users';
    
    protected $fillable = [
        'projectweek_id',
        'user_id',
    ];

    use HasFactory;

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
