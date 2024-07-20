<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'text',
        'image',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
    public function liked($id){
        return Like::where('user_id','=',$id)->where("post_id","=",$this->id)->get()->count()!=0;
    }
    public function bookmarks(){
        return $this->hasMany(Bookmark::class);
    }
    public function bookmarked($id){
        return Bookmark::where('user_id','=',$id)->where("post_id","=",$this->id)->get()->count()!=0;
    }
}
