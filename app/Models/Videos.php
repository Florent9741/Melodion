<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Videos extends Model
{
    protected $primarykey = 'videoId';
    use HasFactory;

    protected $primaryKey = 'videoId';
    public function users()
    {
        return $this->belongsToMany(User::class, 'bibliotheques', 'user_id', 'videoId')
            ->withPivot('public', 'statut')
            ->withTimestamps();
    }
}
