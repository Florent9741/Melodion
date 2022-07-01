<?php

namespace App\Models;


use App\PublishedState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;

    protected $casts = [
        'statut' => PublishedState::class,
    ];
}
