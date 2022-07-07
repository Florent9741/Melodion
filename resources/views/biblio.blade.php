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

        @if (session('status'))
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
                            <a href="{{ route('watch', $video->videoId) }}">

                                @if ($video->pivot->statut)
                                    <i class="fa-solid fa-circle-check text-teal-300 absolute z-10"></i>
                                @else
                                    <i class="fa-solid fa-circle-check text-yellow-600 absolute z-10"></i>
                                @endif
                                <img src="{{ $video->url }}" alt="yt-image" class="w-64 h-auto">

                                <div class="card-body">
                                    <h5>{{ $video->title }}</h5>
                                    <p>{{ \Illuminate\Support\Str::limit($video->description, $limit = 50, $end = ' ...') }}</p>
                                </div>
                                <div class="card-footer text-muted">
                                    Published at {{ date('d M Y', strtotime($video->publishedAt)) }}
                                    <form class="block text-right" action="{{ route('likes') }}" method="POST">
                                        @csrf

                                        <input type="hidden" name="videoId" value="{{ $video->videoId }}">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                        <div
                                            class="inline-block m-0 p-0 text-right ease-in-out hover:text-green-500 duration-300">
                                            <button type="submit" name="like" class="pointer-events-none"
                                                value="1"><i
                                                    class="fa-solid fa-thumbs-up"></i>{{ $video->countlike }}</button>
                                        </div>

                                    </form>
                                </div>
                            </a>

                            <form action="{{ route('biblio.destroy', $video->videoId . '?userId=' . Auth::user()->id) }}"
                                method="POST"
                                class="py-2 px-4 mb-auto border border-transparent text-sm font-semibold rounded-md text-white bg-black ">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Supprimer">
                            </form>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>

       
    @endsection
