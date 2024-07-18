<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followee extends Model
{
    use HasFactory;
    protected $fillable = [
        'target',
        'source'
    ];
    public function source(){
        return $this->belongsTo(User::class,'source','id');
    }
    public function target(){
        return $this->belongsTo(User::class,'target','id');
    }
}
