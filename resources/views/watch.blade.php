@extends('master')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="w-3/5">
                <form action="{{ route('library') }}" method="post">
                    @csrf
                    @if (isset($singleVideo))
                        
                    
                    <input type="hidden" name="videoId" value="{{$id}}">
                    @endif
                    @if (null!==(Auth::user()))
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> 
                    @endif
                
                   <input type="submit" class="sr-only" value="valider">
                <button class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Ajouter à la bibliothèque</button>
                </form>
                <div class="card mb-6" style="width: 100%">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="https://www.youtube.com/embed/" width="889" height="500" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                   
                   
                </div>
            </div>
            <div class="w-2/5">
                <div class="lg:flex-grow md:w-full lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900"> Rédiger un mémo
                    </h1>
                    <div class="relative mb-4">
                        <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                        <form action="/store/{{$id}}" method="post">
                            @csrf
                            <textarea id="message" name="contenu" cols="50" rows="15"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
    
                            <div class="flex justify-center">
                                <button
                                type="submit"
                                    class="inline-flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                    
                                    Enregistrer
                                 </button>
    
                            </div>
    
                        </form>
                    </div>
                  </div>
                </div>
              
            </div>
            <div class="flex flex-col p-5">
                <div class="border-b pb-1 flex justify-between items-center mb-2">
                    <span class=" text-base font-semibold uppercase text-gray-700">Les mémos des autres utilisateurs</span>
                    <img class="w-4 cursor-pointer"
                        src="https://p.kindpng.com/picc/s/152-1529312_filter-ios-filter-icon-png-transparent-png.png" />
                </div>
                @foreach ($memos->where('videoId', '=', $id)  as $memo)
                 
                      
                 
                <div class="flex border-b py-3 cursor-pointer hover:shadow-md px-2 ">
                   
                    <img class='w-10 h-10 object-cover rounded-lg' alt='User avatar'
                        src='https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=200&q=200'>
                    <div class="flex flex-col px-2 w-full">
    
                        <span class="text-sm text-red-500 capitalize font-semibold pt-1">
                            florent 
                        </span>
                        <span class="text-xs text-gray-500 uppercase font-medium ">
                            {{$memo->contenu}}
                        </span>
                        <td class="px-4 py-3">@include('update')
                            <td>	
                                
                                <td class="px-4 py-3">@include('memodelete')
                                    <td>	

                    </div>
                </div>
                @endforeach
                
               
           

               
            </div>
        </div>
    </div>
   
@endsection