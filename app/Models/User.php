<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

   
    protected $guarded = [    ];
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
    public function followed_by(){
        return $this->followers->pluck('source')->contains(auth()->user()->id);
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
        return User::whereNotIn('id', $followed)->where('role','=','user')->get();
    }
    public function followed_posts(){
        $followed = $this->followings()->pluck('target');
        return Post::whereIn('user_id',$followed)->get();
    }
    public function last_reports(){
        return Report::latest()->where('user_id',$this->id)->take(9)->get();
    }
    public function delete(){
        $posts = $this->posts();
        $reports = $this->reports();
        Comment::whereIn('post_id',$posts->pluck('id'))->orWhere('user_id','=',$this->id)->delete();
        Bookmark::whereIn('post_id',$posts->pluck('id'))->orWhere('user_id','=',$this->id)->delete();
        Like::whereIn('post_id',$posts->pluck('id'))->orWhere('user_id','=',$this->id)->delete();
        Followee::where('target','=',$this->id)->orWhere('source','=',$this->id)->delete();
        if($this->avatar != ""){
            Storage::delete('/public'.'/'.$this->avatar);
        }
        foreach($posts->get() as $post){
                Storage::delete('/public'.'/'.$post->image);
        }
        $posts->delete();
        foreach($reports->get() as $report){
                Storage::delete('/public'.'/'.$report->image);
        }
        $reports->delete();
        User::where('id',$this->id)->delete();
    }
}
