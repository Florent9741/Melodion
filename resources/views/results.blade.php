@extends('layouts.app')

@section('main')

    <div class="container h-screen mt-4">
        <div class="row">
            <div class="col">
                @if(!empty($videoLists->items))
                @foreach ($videoLists->items as $key=>$item)

                <div class="row mb-3">
                    <a href="{{route('watch', $item->id->videoId)}}" class="href" style="display:contents">
                        <div class="col-4">
                            <img src="{{$item->snippet->thumbnails->medium->url}}" alt="..." class="img-fluid">
                        </div>
                        <div class="col-8">
                            <h5 class="card-titled">{{\Illuminate\Support\Str::limit($item->snippet->title,$limit=150,$end=' ...')}}</h5>
                            <p class="text-muted">Published at {{date('d M Y',strtotime($item->snippet->publishTime))}}</p>
                            <p>{{\Illuminate\Support\Str::limit($item->snippet->description,$limit=300,$end=' ...')}}</p>
                        </div>
                    </a>
                </div>
               @endforeach
                @else <div class="mt-20 mb-40 text-3xl font-bold text-left text-red-600"> <i class="fa-solid fa-triangle-exclamation"></i>Un problème est survenu, veuillez reessayer ultérieument.</div>
                @endif
                </div>
            </div>

        </div>


    </div>

@endsection
