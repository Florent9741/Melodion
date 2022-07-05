<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memos extends Model
{
    use HasFactory;
    
    protected $fillable = ['contenu','video_id'];

    public function videos()
    {
        return $this->belongsTo(Videos::class, );
    }

}
