@extends('layouts.app')

@section('main')
 <div class="container mt-4">

    <h1 class="text-8xl"> Melodion</h1>

    <div class="row">
        @foreach ($videoLists->items as $key=>$item)

@extends('master')

@section('content')
 <div class="container mt-4">
    <div class="row">
        @foreach ($videoLists->items as $key=>$item)


        <div class="col-4">
            <a href="{{route('watch', $item->id->videoId)}}" class="href">
                <div class="card mb-4">
                    <img src="{{$item->snippet->thumbnails->medium->url}}" class="img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-titled">{{\Illuminate\Support\Str::limit($item->snippet->title,$limit=50,$end=' ...')}}</h5>
                    </div>
                    <div class="card-footer text-muted">
                       Published at {{date('d M Y',strtotime($item->snippet->publishTime)) }}
                    </div>
                </div>
            </a>
        </div>
        @endforeach

</div>
</div>
@endsection
            </a>
            @foreach ($likes as $like)


            <form class="block text-right" action="{{route('likes')}}" method="POST">
                @csrf

                <input type="hidden" name="videoId" value="{{$item->id->videoId}}">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                @if ($like->videoId == $item->id->videoId)
                <div class="inline-block m-0 p-0 text-right ease-in-out hover:text-sky-700 duration-300"><button type="submit" name="like" value="1"><i class="fa-solid fa-thumbs-up"></i>{{$like->count}}</button></div>
                @elseif ($like->videoId != $item->id->videoId)
                <div class="inline-block m-0 p-0 text-right ease-in-out hover:text-sky-700 duration-300"><button type="submit" name="like" value="1"><i class="fa-solid fa-thumbs-up"></i>(0)</button></div>
                @endif

              </form>
        </div>
        @endforeach
        @endforeach

</div>
</div>
@endsection
