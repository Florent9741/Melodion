@extends('layouts.app')

@section('main')
    <div class="container mt-4">

        <div class="grid justify-center gap-2 mb-4 ">

            <h1 class="grid mb-4 text-6xl  md:text-9xl place-items-center">Melodion</h1>

            <h2 class="md:text-4xl">Votre application de relevé de note en ligne</h2>

            <form class="d-flex " method="GET" action="{{ route('results') }}">
                <input class="form-control me-2" type="search" name="search_query" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

        </div>



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
                           @if (!null==(Auth::user()))
                           <input type="hidden" name="videoId" value="{{$video->videoId}}">
                           <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            @endif
                           <div class="inline-block p-0 m-0 text-right duration-300 ease-in-out hover:text-green-500"><button type="submit" name="like" value="1"><i class="fa-solid fa-thumbs-up"></i>{{ $video->countlike}}</button></div>

                       </form>
                    </div>
                </div>
            </a> 
            
    </div> 
        @endforeach

</div>
</div>
@endsection