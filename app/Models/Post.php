<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['likes','caption','image','user_app_id','posted_by'];
    use HasFactory;

    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
