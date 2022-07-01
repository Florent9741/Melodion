<?php

namespace App\Http\Controllers;

use App\Models\Bibliotheques;
use App\Models\Suggestion;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MelodionController extends Controller
{

    public function addtolibrary(Request $request)
    {
    //dd($request->user_id);


        $singleVideo= $this->_singleVideoadd($request->videoId);

        $biblio = new Bibliotheques();
        $biblio->user_id = $request->user_id;
        $biblio->videoId = $request->videoId;
       
        $biblio->public = false;
        $biblio->save();
       
        return redirect()-> route('biblio',$request->user_id)->with('status', 'vidéo ajoutée avec succès !');
    }

    protected function _singleVideoadd($id)
    {
     $api_key=config('services.youtube.api_key');
     $part='snippet';
     $url="https://www.googleapis.com/youtube/v3/videos?part=$part&id=$id&key=$api_key";
     $response= Http::get($url);
     $results=json_decode($response);
     foreach ($results->items as $item)
     //dd($item);
     {
        DB::table('videos')->insert([
       "videoId" =>$item->id,
       "title" =>$item->snippet->title,
       "description" =>$item->snippet->description,
       "url" =>$item->snippet->thumbnails->medium->url,
       "publishedAt" =>date('Y-m-d H:i:s',strtotime($item->snippet->publishedAt)),  
       "created_at"=>now(),
       "updated_at"=>now()     
   ]);}
     File::put(storage_path().'/app/public/single.json', $response->body());
     return $results;
    } 


     public function edit($id)
    {
        $video = Videos::find($id);
        //  $auteurs = Auteurs::all();

        if (isset($video)) {

            return view('library', [
                'video' => $video
                // 'auteurs' => $auteurs
            ]);
        } else {
            return redirect()->route('login');
        }
    }
    public function update(Request $request, $id)
    {

        
      /*  $video = User::with('videos')->where('videoId', '=', $id)->get();
        if (isset($video)) {
            // dd($request);
            $member->prenom = $request->prenom;
            $member->name = $request->name;
            $member->email = $request->email;
  
            $member->save();
            return redirect()->route('profile', $member->id)->with('status', 'votre profil a bien été modifié !');
        } else {
            return redirect()->route('home');
        }*/
    }

    public function show($id)
    {
        $biblios=Bibliotheques::where('user_id','=',$id)->latest()->get();
       foreach ($biblios as $biblio) {
        
        $film[]=$biblio->videoId;
       }
    if (isset ($film)) {
        $videos = Videos::with('users')->whereIn('videoId', $film)->get();
    
     //->where('videoId', '=', $film)
     //->where('id', '=', $id)->get();
       // dd($videos);

        return view('biblio', [
            'videos' => $videos,
            'biblio' => $biblios
        ]);
    }else{
        return view('biblio')->with('status', 'vous n\'avez pas encore de vidéos dans votre bibliothèque !');
    }
}



public function terminer(Request $request, $videoId){

    Bibliotheques::where(['user_id'=> $_GET['userId'] ,'videoId'=> $videoId])->get();


    
    }
}