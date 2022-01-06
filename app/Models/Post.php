<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    use SoftDeletes;
    
    protected $fillable = [
        'tittle', 'slug', 'post_image','post_video', 'post_body', 'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
       return $this->belongsToMany(category::class)->withTimestamps();
    }
}
