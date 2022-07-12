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
            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 md:gap-4">

                {{-- ton end section est là normalement --}}


                @if (count($medias) > 0)

                @foreach ($medias as $media)

                        <div>
                            <div class="mb-4 card shadow transition ease-in-out delay-100  hover:-translate-y-1 hover:scale-110 duration-110">
                                <a href="{{ route('watch', $media->pivot->videoId) }}">
                                     {{-- //{{dd($media)}} --}}
                                        @if ($media->pivot->statut )
                                            <i class="absolute top-5 left-4 z-10 text-teal-300 fa-solid fa-circle-check fa-xl"></i>
                                        @else
                                            <i class="absolute z-10 top-5 left-4 text-yellow-600 fa-solid fa-circle-check fa-xl"></i>
                                        @endif

                                    <img src="{{ $media->url }}" alt="yt-image" class="img-fluid w-full h-auto">

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
                                </a>
                                    <div class="card-footer text-muted">
                                        Publiée le {{ date('d M Y', strtotime($media->pivot->created_at)) }}
                                        <form class="block text-right" action="{{ route('likes') }}" method="POST">
                                            @csrf

                                            <input type="hidden" name="videoId" value="{{ $media->pivot->videoId }}">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                            <div
                                                class="inline-block p-0 m-0 text-right duration-300 ease-in-out hover:text-green-500">
                                                <button type="submit" name="like" class="pointer-events-none"
                                                    value="1"><i
                                                        class="fa-solid fa-thumbs-up">  </i> {{  $media->countlike }}</button>
                                            </div>

                                        </form>
                                    </div>


                                <form
                                    action="{{ route('biblio.destroy', $media->pivot->videoId . '?userId=' . Auth::user()->id) }}"
                                    method="POST"
                                    class="px-4 py-2 mb-auto text-sm font-semibold text-white bg-black border border-transparent rounded-md ">
                                    @csrf
                                    @method('DELETE')
                                    <button class="w-full"  type="submit"> <i class="fa-solid fa-trash-can"></i> Supprimer </button>
                                    {{-- <input type="submit" value=" Supprimer">  --}}
                                </form>

                            </div>
                        </div>

                   @endforeach
                   @else

                       <div class="mt-24 mb-80 text-3xl font-bold text-left text-green-600">
                        La Bibliothèque est vide... </div>
                   @endif

            </div>
        </div>


    @endsection
