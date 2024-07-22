<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

   
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
        'avatar'
    ];
    protected $hidden = [
        'password',
    ];
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
    public function followers(){
        return $this->hasMany(Followee::class,'target','id');
    }
    public function followings(){
        return $this->hasMany(Followee::class,'source','id');
    }
    public function reports(){
        return $this->hasMany(Report::class,'user_id','id');
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function bookmarks(){
        return $this->hasMany(Bookmark::class);
    }
    public function recomendations(){
        $followed = $this->followings->pluck('target');
        $followed[] = $this->id;
        return User::whereNotIn('id', $followed)->where('role','!=','admin')->get();
    }
    public function followed_posts(){
        $followed = $this->followings()->pluck('target');
        return Post::whereIn('user_id',$followed)->get();
    }
    public function last_reports(){
        return Report::latest()->where('user_id',$this->id)->take(5)->get();
    }
}
