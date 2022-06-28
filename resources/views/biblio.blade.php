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

@if (session('status'))
      <div class="text-3xl text-left font-bold text-green-600 mt-20 mb-10">
          {{ session('status') }}
      </div>
  @endif
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">    
           
    <iframe src="https://www.youtube.com/embed/{{$biblio[0]->videoId}}" width="854" height="600" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900"> Rédiger un mémo
        </h1>
        <div class="relative mb-4">
            <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
            <form action="" method="post">

                <input type="hidden" name="videoId" value="">
                
                <input type="hidden" name="user_id" value="">   
                                
                <textarea id="message" name="message" cols="50" rows="15" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
      
               
            </form>
          </div>
          
          <div class="flex justify-center">
          <button class="inline-flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"> Enregistrer </button>
          
        </div>
      </div>
    </div>
{{-- ton end section est là normalement --}}
<div class="container mx-auto flex">
@foreach ($videos as $item)
     

    <a href="{{route('watch', $item->videoId)}}" class="w-64 h-auto">                           
        <div class="card mb-4">
    <img src="{{$item->url}}" alt="yt-image" class="w-64 h-auto">
    <div class="card-body">
        <h5>{{$item->title}}</h5>
        <p>{{\Illuminate\Support\Str::limit($item->description,$limit=50,$end=' ...')}}</p>
    </div>
    <div class="card-footer text-muted">
        Published at {{date('d M Y', strtotime($item->publishedAt))}}
    </div>
        </div>
    </a> 
    @endforeach
</div>

<div class="flex flex-col p-5">
    <div class="border-b pb-1 flex justify-between items-center mb-2">
        <span class=" text-base font-semibold uppercase text-gray-700">Les mémos des autres utilisateurs</span>
        <img class="w-4 cursor-pointer" src="https://p.kindpng.com/picc/s/152-1529312_filter-ios-filter-icon-png-transparent-png.png" />
    </div>

    <div class="flex border-b py-3 cursor-pointer hover:shadow-md px-2 ">
        <img class='w-10 h-10 object-cover rounded-lg' alt='User avatar' src='https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=200&q=200'>
        <div class="flex flex-col px-2 w-full">
            
            <span class="text-sm text-red-500 capitalize font-semibold pt-1">
            Arnaud  
            </span>
            <span class="text-xs text-gray-500 uppercase font-medium ">
                -"Boston," Augustana
            </span>
        </div>
    </div>
     <div class="flex border-b py-3 cursor-pointer hover:shadow-md px-2 ">
        <img class='w-10 h-10 object-cover rounded-lg' alt='User avatar' src='https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=200&q=200'>
        <div class="flex flex-col px-2 w-full">
            
            <span class="text-sm text-red-500 capitalize font-semibold pt-1">
            Romain    
            </span>
            <span class="text-xs text-gray-500 uppercase font-medium ">
                -"Boston," Augustana
            </span>
        </div>
    </div>
</div>

</section>
<script>
    const ytplayer = document.querySelector('#ytplayer');
    ytplayer.addEventListener('timeupdate', function(event) {
        console.log(ytplayer.currentTime);
    })
    
    </script>
<script src="Melodion\resources\views\test.js"></script>
@endsection