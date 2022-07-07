@extends('layouts.app')

@section('main')
    <section class="text-gray-600 body-font">
        @if ($errors->any())
            <div class="text-2xl font-semibold text-left text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="mt-20 mb-10 text-3xl font-bold text-left text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <div class="container mt-4">
            <div class="row">

                {{-- ton end section est là normalement --}}
               
                @if (isset($medias))
                   @foreach ($medias as $media)
                        <div class="col-4">
                            <div class="mb-4 card">
                                <a href="{{ route('watch', $media->pivot->videoId) }}">
                                     {{-- //{{dd($media)}} --}}
                                        @if ($media->pivot->statut )
                                            <i class="absolute z-10 text-teal-300 fa-solid fa-circle-check"></i>
                                        @else
                                            <i class="absolute z-10 text-yellow-600 fa-solid fa-circle-check"></i>
                                        @endif

                                       
                                    




                                    <img src="{{ $media->url }}" alt="yt-image" class="w-64 h-auto">

                                    <div class="card-body">
                                        <h5> {{ \Illuminate\Support\Str::limit($media->title, $limit = 10, $end = ' ...') }}
                                        </h5>
                                        @if (!empty($media->description))
                                            <p>{{ \Illuminate\Support\Str::limit($media->description, $limit = 20, $end = ' ...') }}
                                            </p>
                                        @else
                                            <p> <br></p>
                                        @endif

                                    </div>
                                    <div class="card-footer text-muted">
                                        Published at {{ date('d M Y', strtotime($media->pivot->publishedAt)) }}
                                        <form class="block text-right" action="{{ route('likes') }}" method="POST">
                                            @csrf

                                            <input type="hidden" name="videoId" value="{{ $media->pivot->videoId }}">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                            <div
                                                class="inline-block p-0 m-0 text-right duration-300 ease-in-out hover:text-green-500">
                                                <button type="submit" name="like" class="pointer-events-none"
                                                    value="1"><i
                                                        class="fa-solid fa-thumbs-up"></i>{{ $media->pivot->countlike }}</button>
                                            </div>

                                        </form>
                                    </div>
                                </a>

                                <form
                                    action="{{ route('biblio.destroy', $media->pivot->videoId . '?userId=' . Auth::user()->id) }}"
                                    method="POST"
                                    class="px-4 py-2 mb-auto text-sm font-semibold text-white bg-black border border-transparent rounded-md ">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Supprimer">
                                </form>

                            </div>
                        </div>
                   @endforeach
                @endif
            </div> 
        </div>


    @endsection
