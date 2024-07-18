<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'text','user_id','image','location'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
