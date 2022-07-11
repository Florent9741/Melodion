@extends('layouts.app')

@section('main')
    @if (session('status'))
        <div class="mt-20 mb-10 text-3xl font-bold text-left text-green-600">
            {{ session('status') }}
        </div>
    @endif
    {{-- La partie du haut player et memo --}}
    <div class="flex flex-col md:flex-row ">


        <div id="monplayer" class="flex flex-col w-full gap-4  md:w-3/5 md:mt-4 md:ml-4">
            <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->

            {{-- Le player la barre et le currentime --}}
            <div class="flex flex-col ">

                <div id="player" class="w-auto h-full md:w-full md:h-80 md:rounded">
                </div>


                <!-- affiche le current time -->
                <div class="flex flex-row">
                    <div id="currentTime" class="flex flex-row">
                        <p> <span id="currentTimeSpan"></span>
                            {{-- affiche le total time en minute et seconde --}}
                            : <span id="totalTimeSpan"></span></p>
                    </div>

                </div>

                <!-- curseur de progression -->
                <input type="range" id="seek-bar" value="0" max="100" step="1">
            </div>

            <div class="w-full flex flex-col gap-5 xl:flex-row items-center lg:space-between lg:flex-wrap lg:gap-7   ">
                {{-- Les boutons --}}
                <div class="lg:order-1  lg:w-1/2 flex flex-row justify-center my-2">

                    <!-- boutton pour rejouer la video -->
                    <button id="replay"
                        class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 justify-center font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                        <i class="fa-solid fa-backward-step"></i>

                        {{-- bouton qui switch sur pause ou sur play --}}
                        <button id="play-pause1"
                            class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 justify-center font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">

                            <i class="fa-solid fa-play"></i>

                            <i class="fa-solid fa-pause"></i>


                            <!-- boutton pour arreter la video -->

                            <button id="stop"
                                class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 justify-center font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800"><i
                                    class="fa-solid fa-stop "></i>

                </div>



                {{-- La vitesse --}}
                <div class="lg:order-3 w-full px-1 lg:w-2/3">
                    <input type="range" min="25" max="100" value="25" class="range" step="5" />
                    <div class="w-full flex justify-between text-xs px-2 my-2 ">

                        <span id="0.25">|x0,25</span>
                        <span id="0.5">|x0.5</span>
                        <span id="0.75">|x0.75</span>
                        <span id="1">|x1</span>

                    </div>
                </div>

                {{-- Le son --}}
                <div class="lg:order-2 w-full lg:w-1/3 px-1 pt-1 flex flex-row">

                    {{-- input toggle checkbox mute/unmute --}}

                    {{-- <i class="fa-solid fa-volume-xmark"></i>
                            <input type="checkbox" id="mute-checkbox"> --}}

                    {{-- boutton mute/unmute --}}
                    <button id="mute"
                        class="flex flex-row place-self-center text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 justify-center font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                        <i class="fa-solid fa-volume-mute hidden"></i>
                        <i class="fa-solid fa-volume-up"></i>
                    </button>

                    {{-- progress bar pour le volume --}}
                    <input id="volumebar" type="range" min="0" max="100" value="50"
                        class="range range-xs range-accent place-self-center" step="1" />

                </div>



                {{-- lecture en boucle --}}

                <div class="lg:order-4 lg:gap-x-6 w-full lg:w-1/6 flex flex-row justify-evenly lg:flex-end lg:mb-1 ">

                    <div>

                        <!-- boutton A currenttime  -->
                        <button id="A" class="bg-blue-500 w-20 rounded-full"><i class="fa-solid fa-a"></i>
                        </button>

                        <!-- affiche la valeur de A en minute et seconde -->
                        <div id="A-time">
                            <p class="lg:pt-3 text-center">A time: <span id="A-time-span"></span>

                        </div>

                    </div>


                    <div>
                        <!-- boutton B currenttime  -->
                        <button id="B" class="bg-red-500 w-20 rounded-full"><i class="fa-solid fa-b"></i></button>
                        <!-- affiche la valeur de B en minute et seconde  -->
                        <div id="B-time">
                            <p class="lg:pt-3 text-center">B time: <span id="B-time-span"></span>
                        </div>
                    </div>

                    <div>

                        <input type="checkbox" id="loop-checkbox" class="checkbox checkbox-sm">
                        <div class="justify-center">
                            <i class="fa-solid fa-arrow-rotate-left "></i>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                // 2. This code loads the IFrame Player API code asynchronously.
                var tag = document.createElement('script');
                tag.src = "https://www.youtube.com/iframe_api";
                var firstScriptTag = document.getElementsByTagName('script')[0];
                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
                // 3. This function creates an <iframe> (and YouTube player)
                //    after the API code downloads.
                var player;

                function onYouTubeIframeAPIReady() {
                    player = new YT.Player('player', {
                        height: '360',
                        width: '640',
                        videoId: '{{ $id }}',
                        events: {
                            'onReady': onPlayerReady,
                            'onStateChange': onPlayerStateChange
                        }
                    });
                }
                // 4. The API will call this function when the video player is ready.
                function onPlayerReady(event) {
                    event.target.playVideo();
                }
                // 5. The API calls this function when the player's state changes.
                //    The function indicates that when playing a video (state=1),
                //    the player should play for six seconds and then stop.
                var done = false;

                function onPlayerStateChange(event) {}

                function stopVideo() {
                    player.stopVideo();
                }
                // bouton qui switch sur pause ou sur play
                document.getElementById('play-pause1').addEventListener('click', function() {
                    if (player.getPlayerState() == 1) {
                        player.pauseVideo();
                    } else {
                        player.playVideo();
                    }
                });
                // boutton pour arreter la video
                document.getElementById('stop').addEventListener('click', function() {
                    player.stopVideo();
                });
                // boutton pour rejouer la video
                document.getElementById('replay').addEventListener('click', function() {
                    player.seekTo(0);
                    player.playVideo();
                });
                // {{-- barre range vitesse lecture --}}
                document.getElementsByClassName('range')[0].addEventListener('change', function() {
                    player.setPlaybackRate(this.value / 100);
                });
                // input toggle checkbox mute/unmute
                // document.getElementById('mute-checkbox').addEventListener('change', function() {
                //     if (this.checked) {
                //         player.mute();
                //     } else {
                //         player.unMute();
                //     }
                // });

                // boutton mute/unmute
                document.getElementById('mute').addEventListener('click', function() {
                    if (player.isMuted()) {
                        player.unMute();

                    } else {
                        player.mute();
                    }
                });

                //  si volume mute montrer icon mute sinon icon volume up
                document.getElementById('mute').addEventListener('click', function() {
                    if (!player.isMuted()) {
                        document.getElementById('mute').innerHTML = '<i class="fa-solid fa-volume-mute"></i>';
                    } else {
                        document.getElementById('mute').innerHTML = '<i class="fa-solid fa-volume-up"></i>';
                    }
                });
                // progress bar volumebar
                document.getElementById('volumebar').addEventListener('change', function() {
                    player.setVolume(this.value);
                });
                // curseur de progression qui progresse automatiquement
                var interval = setInterval(function() {
                    var currentTime = player.getCurrentTime();
                    var duration = player.getDuration();
                    var percentage = (currentTime / duration) * 100;
                    document.getElementById('seek-bar').value = percentage;
                }, 1000);
                // curseur de progression de la video
                document.getElementById('seek-bar').addEventListener('change', function() {
                    var percentage = this.value;
                    var duration = player.getDuration();
                    player.seekTo(duration * (percentage / 100));
                });
                // boutton A pour loop
                const A = document.getElementById('A');
                const B = document.getElementById('B');
                const playPausePoints = {
                    A: -1,
                    B: -1,
                };
                // affiche le current time
                setInterval(function() {
                    var currentTime = player.getCurrentTime();
                    document.getElementById('currentTimeSpan').innerHTML = currentTime;
                    abloop(currentTime, boucle);
                }, 1000);
                // affiche le current time en minute et seconde
                setInterval(function() {
                    var currentTime = player.getCurrentTime();
                    var minutes = Math.floor(currentTime / 60);
                    var seconds = Math.floor(currentTime % 60);
                    document.getElementById('currentTimeSpan').innerHTML = minutes + ":" + seconds;
                }, 1000);
                // affiche le total time en minute et seconde
                setInterval(function() {
                    var totalTime = player.getDuration();
                    var minutes = Math.floor(totalTime / 60);
                    var seconds = Math.floor(totalTime % 60);
                    document.getElementById('totalTimeSpan').innerHTML = minutes + ":" + seconds;
                }, 10);
                // quand B est different de -1 ET B > A
                A.addEventListener('click', function() {
                    playPausePoints.A = player.getCurrentTime();
                    // affiche la valeur de A
                    document.getElementById('A-time-span').innerHTML = playPausePoints.A;
                    // A en minute et seconde
                    var minutes = Math.floor(playPausePoints.A / 60);
                    var seconds = Math.floor(playPausePoints.A % 60);
                    document.getElementById('A-time-span').innerHTML = minutes + ":" + seconds;
                });
                B.addEventListener('click', function() {
                    playPausePoints.B = player.getCurrentTime();
                    // affiche la valeur de B en minute et seconde
                    document.getElementById('B-time-span').innerHTML = playPausePoints.B;
                    // affiche B en minute
                    var minutes = Math.floor(playPausePoints.B / 60);
                    // affiche B en seconde
                    var seconds = Math.floor(playPausePoints.B % 60);
                    // affiche B en minute et seconde
                    document.getElementById('B-time-span').innerHTML = minutes + ":" + seconds;
                });

                function abloop(currentTime, boucle = true) {
                    // si B est different de -1 ET B > A
                    if (boucle && playPausePoints.B != -1 && playPausePoints.B > playPausePoints.A && currentTime >= playPausePoints
                        .B) {
                        // joue la video de A à B
                        // quand j'atteinds le point B
                        player.seekTo(playPausePoints.A);
                        player.playVideo();
                    }
                }
                //   // boutton pour lancer la boucle
                //     document.getElementById('loop-on').addEventListener('click', function() {
                //         boucle = true;
                //     });
                //   // boutton arreter la boucle
                //     document.getElementById('loop-off').addEventListener('click', function() {
                //         boucle = false;
                //     });
                //  checkbox toggle pour la lecture en boucle
                document.getElementById('loop-checkbox').addEventListener('change', function() {
                    if (this.checked) {
                        boucle = true;
                    } else {
                        boucle = false;
                    }
                });
            </script>
        </div>


        @Auth
            {{-- Le formulaire de memo --}}
            <div class=" flex-col w-full md:w-2/5 sm:my-5 md:ml-4 lg::ml-0">

                <div class="flex flex-row justify-evenly items-center">
                    {{-- bouton pour ajouter la video à la bibliothèque --}}
                  
                    <form action="{{ route('library') }}" method="post" class="">
                        @csrf
                       @if(!empty($singleVideo->items[0]))
                        <input type="hidden" name="videoId" value="{{$singleVideo->items[0]->id}}">
                        @else <div class="mt-20 mb-40 text-3xl font-bold text-left text-red-600">La clé API doit être changée dans le fichier .env</div>
                        @endif                                    
                        @if (null !== Auth::user())
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @endif

                        <input type="submit" class="sr-only" value="valider">

                        <button
                            class=" text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 justify-end font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2  dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                            <i class="fa-solid fa-bookmark fa-red-500"></i> Ajouter à la bibliothèque
                        </button>

                    </form>
                
                    {{-- bouton terminer --}}



                    <form action="/watch" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="statut" value="1">
                        @if (!null == Auth::user())
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @endif
                        @if(!empty($singleVideo->items[0]))
                        <input type="hidden" name="videoId" value="{{ $singleVideo->items[0]->id }}">
                        
                        @endif
                        <button type="submit"
                            class="flex flex-row-reverse text-lg text-white bg-black border-0 rounded focus:outline-none"
                            aria-required="true" name="submit" id="save">
                            Terminer

                        </button>
                    </form>

                </div>



                <div class="  lg:flex-grow md:w-full   md:justify-center flex flex-col  md:text-left items-center text-center">

                    <h1 class="mb-4 text-3xl font-medium text-gray-900 title-font sm:text-4xl">
                        Rédiger un mémo
                    </h1>

                    <div class="relative px-2 mb-4 md:px-0 lg:px-0 ">

                        <form action="/store/{{ $id }}" method="post">
                            @csrf

                            <textarea id="message" name="contenu" cols="50" rows="15"
                                class="w-full h-64 py-1 text-base leading-6 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none resize-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200"></textarea>
                            <div class="flex justify-center">
                                <button type="submit"
                                    class="inline-flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">

                                    Enregistrer
                                </button>

                            </div>

                        </form>
                    </div>



                    <div class="flex flex-row gap-x-3 ">




                        <form action="/watch" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="statut" value="1">
                            @if (!null == Auth::user())
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            @endif
                            @if(!empty($singleVideo->items[0]))
                            <input type="hidden" name="videoId" value="{{ $singleVideo->items[0]->id }}">
                            
                            @endif
                            <button type="submit"
                                class="flex flex-row-reverse px-6 py-2 text-lg text-white bg-black border-0 rounded focus:outline-none"
                                aria-required="true" name="submit" id="save">
                                Terminer

                            </button>
                        </form>
                    </div>
                </div>

                <div class="border w-auto m-2 mr-4 text-left">
                    @foreach ($memos->where('videoId', '=', $id && 'user_id', '=', Auth::user()->id) as $memo)
                        @if ($memo->videoId == $id && $memo->user_id == Auth::user()->id)
                            <div class="flex-col  sm:my-5 md:ml-4 lg::ml-0 ">
                                <div class="flex flex-col justify-evenly items-center m-2">
                                    <div class="flex flex-row justify-evenly items-center bg-slate-50 border-slate-400 border rounded-lg  p-2 ">
                                        {{ $memo->contenu }}
                                    </div>
                                    <div class="text-slate-500 m-2">
                                       Ajouté le :  {{ $memo->created_at }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>



            </div>






            {{-- Mes memos --}}

        @endauth
    </div>
    </div>



    {{-- LES MEMOS PUBLICS --}}



    <div class="flex flex-col w-full px-2 mt-5">
        <div class="flex items-center justify-between pb-1 mb-2 border-b">
            <span class="text-base font-semibold text-gray-700 uppercase ">Les mémos des autres
                utilisateurs</span>
            <img class="w-4 cursor-pointer"
                src="https://p.kindpng.com/picc/s/152-1529312_filter-ios-filter-icon-png-transparent-png.png" />
        </div>
        @foreach ($memos->where('videoId', '=', $id) as $memo)
            {{-- Memo user1 --}}

            <div class="flex px-2 py-3 border-b cursor-pointer hover:shadow-md ">

                <img class='object-cover w-10 h-10 rounded-lg' alt='User avatar'
                    src='https://photoclubdethuir.fr/wp-content/uploads/2019/01/avatar_gris-8.png'>


                <div class="flex flex-col w-full px-2">

                    <span class="pt-1 text-sm font-semibold text-red-500 capitalize">

                        <?php
                        $user = App\Models\User::find($memo->user_id);
                        echo $user->name;
                        ?>
                    </span>

                    <span class="text-xs font-medium text-gray-500 uppercase ">
                        {{ $memo->contenu }}
                    </span>
                    @if (null !== Auth::user())
                        @if (Auth::user()->id == $memo->user_id)
                            <div class="px-4 flex flex-row items-center space-x-96">
                                @include('update')
                                @include('memodelete')
                            </div>
                        @endif
                    @endif
                </div>
            </div>
    </div>
    </div>
    @endforeach
@endsection
