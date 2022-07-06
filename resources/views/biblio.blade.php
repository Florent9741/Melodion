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
    @if (isset($biblio))       
    <iframe class="rounded " src="https://www.youtube.com/embed/{{$biblio[0]->videoId}}" width="854" height="600" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

@endif
   
    </div>
{{-- ton end section est là normalement --}}
<div class="container mx-auto flex">
    @if (isset($biblio))      
@foreach ($videos as $item)
     

    <a href="{{route('watch',$item->videoId)}}" class="w-64 h-auto">                           
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
    @if (!null==Auth::user())
    <form action="{{route('biblio.destroy', $item->videoId.'?userId='.Auth::user()->id)}}" method="POST" class="py-2 px-4 mb-auto border border-transparent text-sm font-semibold rounded-md text-white bg-black ">
      @endif
        @csrf
        @method('DELETE')
      <input type="submit" value="Supprimer">
      </form>   
    @endforeach
@endif
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

@endsection