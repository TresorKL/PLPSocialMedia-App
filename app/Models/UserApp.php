<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApp extends Model
{
    protected $fillable = ['email','name','password'];
    use HasFactory;
    
    public function post(){
        return $this->hasMany(Post::class);
    }
}
