<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use HasFactory;
    protected $fillable = ['name', 'email', 'password'];
    public $timestamps = true;

    public function todo(){
        return $this->hasOne(Todo::class)->latestOfMany();
    }
}
