@extends('master')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="w-3/5">
                <form action="{{ route('library') }}" method="post">
                    @csrf
                    <input type="hidden" name="videoId" value="{{$singleVideo->items[0]->id}}">
                    @if (null!==(Auth::user()))
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> 
                    @endif
                
                   <input type="submit" class="sr-only" value="valider">
                <button class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Ajouter à la bibliothèque</button>
                </form>
                <div class="mb-6 card" style="width: 100%">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="https://www.youtube.com/embed/{{$singleVideo->items[0]->id}}" width="889" height="500" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="card-body">
                        <h5>{{$singleVideo->items[0]->snippet->title}}</h5>
                        <p class="text-secondary">Published at {{date('d M Y', strtotime($singleVideo->items[0]->snippet->publishedAt))}}</p>
                        <p>{{$singleVideo->items[0]->snippet->description}}</p>
                    </div>
                </div>
            </div>
            <div class="w-2/5">
                <div class="flex flex-col items-center text-center lg:flex-grow md:w-full lg:pl-24 md:pl-16 md:items-start md:text-left">
                    <h1 class="mb-4 text-3xl font-medium text-gray-900 title-font sm:text-4xl"> Rédiger un mémo
                    </h1>
                    <div class="relative mb-4">
                        <label for="message" class="text-sm leading-7 text-gray-600">Message</label>
                        <form action="{{ route('memos',$singleVideo->items[0]->id )}}" method="post">
                            @csrf

                            <input type="hidden" name="videoId" value="">

                            <input type="hidden" name="user_id" value="">

                            <textarea id="message" name="contenu" cols="50" rows="15"
                                class="w-full h-32 px-3 py-1 text-base leading-6 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none resize-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200"></textarea>

                            <div class="flex justify-center">
                                <button
                                type="submit"
                                    class="inline-flex px-6 py-2 text-lg text-white bg-red-500 border-0 rounded focus:outline-none hover:bg-indigo-600">

                                    Enregistrer
                                 </button>

                            </div>

                        </form>
                      </div>
                      
                     
                  </div>
                </div>
              
            </div>
        </div>
    </div>
        

@endsection