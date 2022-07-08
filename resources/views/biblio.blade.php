@extends('layouts.app')

@section('main')
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
  <div class="container mt-4">
    <div class="row">

{{-- ton end section est là normalement --}}

    @foreach ($videos as $video)
    <div class="col-4">
    <div class="card mb-4">
    <a href="{{route('watch',$video->videoId)}}">

            @if ($video->pivot->statut)
    <i class="fa-solid fa-circle-check text-teal-300 absolute z-10"></i>

            @else
                <i class="fa-solid fa-circle-check text-yellow-600 absolute z-10"></i>

            @endif
    <img src="{{$video->url}}" alt="yt-image" class="w-64 h-auto">

   <div class="card-body">
        <h5>{{$video->title}}</h5>
        <p>{{\Illuminate\Support\Str::limit($video->description,$limit=50,$end=' ...')}}</p>
    </div>
    <div class="card-footer text-muted">
        Published at {{date('d M Y', strtotime($video->publishedAt))}}
        <form class="block text-right" action="{{route('likes')}}" method="POST">
            @csrf

            <input type="hidden" name="videoId" value="{{$video->videoId}}">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

            <div class="inline-block m-0 p-0 text-right ease-in-out hover:text-green-500 duration-300"><button type="submit" name="like" class="pointer-events-none" value="1"><i class="fa-solid fa-thumbs-up"></i>{{ $video->countlike}}</button></div>

        </form>
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

</div>

</div>
</div>
@endforeach
</div>
</div>
<div class="p-5">
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

@endsection
