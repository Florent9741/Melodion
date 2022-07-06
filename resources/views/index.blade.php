@extends('master')

@section('content')
 <div class="container mt-4">
    <div class="row">
        @foreach ($videos as $video)
                    

        <div class="col-4">
            <a href="{{route('watch', $video->videoId)}}" class="href">
                <div class="card mb-4">
                    <img src="{{$video->url}}" class="img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-titled">{{\Illuminate\Support\Str::limit($video->title,$limit=50,$end=' ...')}}</h5>
                    </div>
                    <div class="card-footer text-muted">
                       Published at {{date('d M Y',strtotime($video->publishedAt)) }}
                       <form class="block text-right" action="{{route('likes')}}" method="POST">
                           @csrf
                       
                           <input type="hidden" name="videoId" value="{{$video->videoId}}">
                           <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                           
                           <div class="inline-block m-0 p-0 text-right ease-in-out hover:text-green-500 duration-300"><button type="submit" name="like" value="1"><i class="fa-solid fa-thumbs-up"></i>{{ $video->countlike}}</button></div>
                           
                       </form>
                    </div>
                </div>
            </a> 
           
         
      
    </div> 
        @endforeach
     
</div>
</div>   
@endsection