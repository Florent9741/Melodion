@extends('master')

@section('content')
<section class="text-gray-600 body-font">
    @if ($errors->any())
<div class="text-red-600 text-2xl text-left font-semibold">
<ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif


@if (session('status' ))
      <div class="text-3xl text-left font-bold text-green-600 mt-20 mb-10">
          {{ session('status') }}
      </div>
  @endif
    
{{-- ton end section est là normalement --}}
<div class="container mx-1 flex-col">

    
@foreach ($videos as $video)
     



    <a href="{{route('watch',$video->videoId)}}" class="w-64 h-auto">                           
        <div class="card my-10">
            @if ($video->pivot->statut) 
    <i class="fa-solid fa-circle-check text-teal-300 absolute z-10"></i>
            
            @else 
                <i class="fa-solid fa-circle-check text-red-600 absolute z-10"></i>
            
            @endif
    <img src="{{$video->url}}" alt="yt-image" class="w-64 h-auto ">
   
   <div class="card-body">
        <h5>{{$video->title}}</h5>
        <p>{{\Illuminate\Support\Str::limit($video->description,$limit=50,$end=' ...')}}</p>
    </div>
    <div class="card-footer text-muted  ">
        Published at {{date('d M Y', strtotime($video->publishedAt))}}
    </div>
        </div>
    </a>
    <form action="{{route('biblio.destroy', $video->videoId.'?userId='.Auth::user()->id)}}" method="POST" class=" flex flex-col py-2 px-4 mb-auto border border-transparent text-sm font-semibold rounded-md text-white bg-black ">
        @csrf
        @method('DELETE')
      <input type="submit" value="Supprimer">
      </form>   
    @endforeach

</div>



</section>

@endsection