<?php

namespace App\Http\Controllers;

use App\Enums\PublishedState;
use App\Models\Bibliotheque;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;

class BiblioController extends Controller
{
    public function etat(){
        $video=Bibliotheque::find();
     
      if  ($video->etat_id === PublishedState::EnCours){
$video->etat_id = publishedState::Terminer;
$video->save();
      }

if ($video->etat_id === PublishedState::Terminer){
$video->etat_id = publishedState::EnCours;
$video->save();
}




}
} 