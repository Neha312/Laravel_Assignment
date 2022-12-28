<?php

namespace App\Models;

use App\Models\Role1;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User1 extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'username'
    ];
    protected $table = 'users';
    public function roles()
    {
        return $this->belongsToMany(Role1::class);
    }
}
