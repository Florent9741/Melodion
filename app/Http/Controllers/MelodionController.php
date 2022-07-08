<?php

namespace App\Http\Controllers;

use App\Enums\VideoState;
use App\Models\Bibliotheques;
use App\Models\Memos;
use App\Models\Suggestion;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Videos;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Throwable;

class MelodionController extends Controller
{

    public function addtolibrary(Request $request)
    {
        //dd($request->user_id);
        try {

            $singleVideo = $this->_singleVideoadd($request->videoId);

            
            // Validate the value...
        } catch (Throwable $e) {
            report($e);
            return redirect()->route('biblio', $request->user_id)->with('status', 'la video existe déja dans la bibliothèque');

            return false;
        }    

        try {

            $biblio = new Bibliotheques();
            $biblio->user_id = $request->user_id;
            $biblio->videoId = $request->videoId;
            $biblio->public = false;
           
            $biblio->save();
        
        } catch (Throwable $e) {
            report($e);
            return redirect()->route('biblio', $request->user_id)->with('status', 'la video existe déja dans la bibliothèque');

            return false;
        }



        return redirect()->route('biblio', $request->user_id)->with('status', 'vidéo ajoutée avec succès !');
    }


    public function creatememo(Request $request, $id)
    {
        $validate = $request->validate([
            'contenu' => 'required',

        ]);

        try {

        $memos = new Memos();
        $memos->user_id = Auth::id();
        $memos->videoId = "$id";
        $memos->contenu = $request['contenu'];
 
        $memos->save();

    } catch (Throwable $e) {
        report($e);
        return redirect()->route('watch', $memos->videoId)->with('status', 'Veuillez ajouter la video dans la biblioteque pour pouvoir insérer un memo.');
    

        return false;
    }
        return redirect()->route('watch', $memos->videoId);
    }

    public function updatememo(Request $request, $id)
    {
        
        $memos = Memos::where(['videoId'=>$id, 'user_id'=> $request->user_id])
        ->find($request->id_memos);


        
       $memos->id =$request->id_memos;
        $memos->update([
            'user_id'  => $request->user_id,
            'videoId' => $id,
            'contenu' => $request->contenu,
            
        ]);

    return redirect()->route('watch',$id)->with('modifié','Film modifié');
    }

    public function delete(Request $request)
    {
    
        $memos = Memos::where(['user_id'=> $request->user_id]);
        
       $memos=Memos::find($request->id_memos);
        $memos->delete();
        return redirect()->route('watch',$memos->videoId);
    }

    protected function _singleVideoadd($id)
    {
<<<<<<< HEAD
        $api_key = config('services.youtube.api_key');
        $part = 'snippet';
        $url = "https://www.googleapis.com/youtube/v3/videos?part=$part&id=$id&key=$api_key";
        $response = Http::get($url);
        $results = json_decode($response);
        foreach ($results->items as $item)
            $check = DB::select('SELECT * FROM videos WHERE videoId=?', [$item->id]);
        if (count($check) == 1) {
            //rien
        } else
        //dd($item);
        {
            DB::table('videos')->insert([
                "videoId" => $item->id,
                "title" => $item->snippet->title,
                "description" => $item->snippet->description,
                "url" => $item->snippet->thumbnails->medium->url,
                "publishedAt" => date('Y-m-d H:i:s', strtotime($item->snippet->publishedAt)),
                "created_at" => now(),
                "updated_at" => now()
            ]);
        }
        File::put(storage_path() . '/app/public/single.json', $response->body());
        return $results;
    }


    public function edit($id)
=======
     $api_key=config('services.youtube.api_key');
     $part='snippet';
     $url="https://www.googleapis.com/youtube/v3/videos?part=$part&id=$id&key=$api_key";
     $response= Http::get($url);
     $results=json_decode($response);
     foreach ($results->items as $item)
     $check=DB::select('SELECT * FROM videos WHERE videoId=?',[$item->id]);
     if (count($check)== 1) {
        //rien
      } else
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
>>>>>>> 711512acbe84fde5b3ee5cd6d7e3de73a5ed47cb
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
            return redirect()->route('home');*/
        }
/*public function show($id)
    {
    $user=User::with('videos')->find($id);
    $videos = $user->videos;
  //dd($videos);
   
    if($videos)
    {
            return view('biblio', [
                'videos' => $videos
                
            ]);
    } else
        return view('biblio')->with('status', 'vous n\'avez pas encore de vidéos dans votre bibliothèque !');
}
*/


 public function show($id)
    {

        
            $user = User::with('videos')->find($id);
            $medias = $user->videos;
            
            //$videos = Videos::with('users')->get();
            //->where('videoId', '=', $film)
            //->where('id', '=', $id)->get();
            // dd($videos);

            return view('biblio', [
                
                'medias' => $medias
            ]);
         

            return view('biblio')->with('status', 'vous n\'avez pas encore de vidéos dans votre bibliothèque !');
        
    }




    public function destroy(Request $request, $videoId)
    {
        // dd($_GET['userId']);

        if (isset($videoId) and !is_numeric($videoId)) {
            //
            Bibliotheques::where(['user_id' => $_GET['userId'], 'videoId' => $videoId])
                ->delete();
            Videos::where('videoId', '=', $videoId)->delete();

            return redirect()->route('biblio', $_GET['userId'])->with('status', 'vidéo supprimée avec succès !');
        }
    }

    public function terminer(Request $request)
    {
        if (isset($request)) {
            $update = DB::update('UPDATE bibliotheques SET statut=1 WHERE videoId=? AND user_id=?', [$request->videoId, $request->user_id]);




            return redirect()->route('biblio', $request->user_id)->with('status', 'vidéo terminée');
        }
    }
}
