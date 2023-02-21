<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//hjkd
class Comment extends Model
{
    protected $fillable=[ 'commented_by','comment_text','post_id' ];
    
    use HasFactory;
}
