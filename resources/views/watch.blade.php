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
                <div class="card mb-6" style="width: 100%">
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
                <div class="lg:flex-grow md:w-full lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900"> Rédiger un mémo
                    </h1>
                    <div class="relative mb-4">
                        <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                        <form action="" method="post">
            
                            <input type="hidden" name="videoId" value="">
                            
                            <input type="hidden" name="user_id" value="">   
                                            
                            <textarea id="message" name="message" cols="50" rows="15" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-64 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                  
                           
                        </form>
                      </div>
                      
                      <div class="flex justify-center">
                      <button class="inline-flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"> Enregistrer </button>
                      
                    </div>
                  </div>
                </div>
              
            </div>
        </div>
    </div>
        

@endsection