<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;



class YouTubeController extends Controller
{
    public function index()
    {
        
        if (session('search_query')){
        $videoLists= $this->_videoLists(session('search_query'));
    }else {
        $videoLists= $this->_videoLists('morceaux de musique?rock?guitare');
    }
  
        return view('index', compact('videoLists'));


    }
   
    public function results(Request $request)

    {
       
        session(['search_query'=>$request->search_query]);
        $videoLists= $this->_videoLists($request->search_query);
        return view('results', compact('videoLists'));
    }
    public function watch($id)
    {
        $singleVideo= $this->_singleVideo($id);
        if (session('search_query')){
            $videoLists= $this->_videoLists(session('search_query'));
        }else {
            $videoLists= $this->_videoLists('cours de musique');
        }
        return view('watch', compact('singleVideo','videoLists'));
    }

    protected function _videoLists($keywords)
    {
        $part = 'snippet';
        /*,contentDetails,statistics,status*/

        $country ='US';
        $apiKey=config('services.youtube.api_key');
        $maxResults= 4;
        $youTubeEndPoint=config('services.youtube.search_endpoint');
        $type='video';
        /*$type='video,playlist,channel';*/

        $url = "$youTubeEndPoint?part=$part&maxResults=$maxResults&regionCode=$country&type=$type&key=$apiKey&q=$keywords";
        $response= Http::get($url);
        $results=json_decode($response);
       // dd($results);
      /* foreach ($results->items as $item) {
             DB::table('API')->insert([
            "videoId" =>$item->id->videoId,
            "title" =>$item->snippet->title,
            "description" =>$item->snippet->description,
            "url" =>$item->snippet->thumbnails->medium->url,
            "publishedAt" =>date('Y-m-d H:i:s',strtotime($item->snippet->publishedAt)),
            "publishTime" =>date('Y-m-d H:i:s',strtotime($item->snippet->publishTime)),
            
        ]);
    } */
        File::put(storage_path().'/app/public/results.json', $response->body());
        return $results;

    }   
   protected function _singleVideo($id)
   {
    $api_key=config('services.youtube.api_key');
    $part='snippet';
    $url="https://www.googleapis.com/youtube/v3/videos?part=$part&id=$id&key=$api_key";
    $response= Http::get($url);
    $results=json_decode($response);
    File::put(storage_path().'/app/public/single.json', $response->body());
    return $results;
   } 

}

