@extends('master')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-8">
                <form action="{{ route('library') }}" method="post">
                    @csrf
                    <input type="hidden" name="videoId" value="{{$singleVideo->items[0]->id}}">
                    @if (null!==(Auth::user()))
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> 
                    @endif
                
                   <input type="submit" class="sr-only" value="valider">
                <button class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Ajouter à la bibliothèque</button>
                </form>
                <div class="card mb-4" style="width: 100%">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="https://www.youtube.com/embed/{{$singleVideo->items[0]->id}}" width="854" height="600" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="card-body">
                        <h5>{{$singleVideo->items[0]->snippet->title}}</h5>
                        <p class="text-secondary">Published at {{date('d M Y', strtotime($singleVideo->items[0]->snippet->publishedAt))}}</p>
                        div           <p>{{$singleVideo->items[0]->snippet->description}}</p>
                    </div>
                </div>
                <form action="{{ route('library') }}" method="post">
                    @csrf
                    <input type="hidden" name="videoId" value="{{$singleVideo->items[0]->id}}">
                    @if (null!==(Auth::user()))
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> 
                    @endif
                
                   <input type="submit" class="sr-only" value="valider">
                <button class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Ajouter à la bibliothèque</button>
                </form>

            </div>
            <div class="col-4">
                        @foreach ($videoLists->items as $key=>$item)
                            
                        
                        <div class="col-12">
                            <a href="{{route('watch', $item->id->videoId)}}" class="href">                           
                                <div class="card mb-4">
                            <img src="{{$item->snippet->thumbnails->medium->url}}" alt="">
                            <div class="card-body">
                                <h5>{{\Illuminate\Support\Str::limit($item->snippet->title,$limit=50,$end=' ...')}}</h5>
                            </div>
                            <div class="card-footer text-muted">
                                Published at {{date('d M Y', strtotime($item->snippet->publishTime))}}
                            </div>
                                </div>
                            </a> 
                        </div>
                        @endforeach
                    </div>
                </div>
              
            </div>
        </div>
    </div>
        

@endsection