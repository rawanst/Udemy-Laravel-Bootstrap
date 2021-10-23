<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";
    protected $fillable = ['title', 'description', 'extrait', 'picture', 'user_id'];

    public function comments()
    {
        return $this->hasMany(Comment::class,'post','id');
    }
    //les functions onetomany ect se tranforment en attribut donc s'appel $post->comments et pas $post->comments()

    public function countComments()
    {
        return sizeof($this->comments);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'posts_categories','post', 'category');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
