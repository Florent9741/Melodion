<?php

namespace App\Http\Controllers;

use App\Enums\PublishedState;

use App\Models\Bibliotheques;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;

class BiblioController extends Controller
{
    public function etat(Request $request, $videoId){
        $video=Bibliotheques::where(['user_id'=> $_GET['userId'] ,'videoId'=> $videoId])->first();
     
      if  ($video->statut === PublishedState::EnCours){
$video->statut = publishedState::Terminer;
$video->save();
      }

if ($video->statut === PublishedState::Terminer){
$video->statut = publishedState::EnCours;
$video->save();
}
}




} 