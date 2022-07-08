<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memos extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_user';
   
    
  
    
    protected $fillable = ['contenu','videoId','user_id' ];

    public function videos()
    {
        return $this->belongsTo(Videos::class, 'videoId' );
    }
}
