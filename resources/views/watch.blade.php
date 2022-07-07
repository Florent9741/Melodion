@extends('layouts.app')

@section('main')

    {{-- La partie du haut player et memo --}}
    <div class="flex flex-col md:flex-row ">


        <div id="monplayer" class=" w-full md:w-3/5 md:mt-4 md:ml-4 flex flex-col gap-4">
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


            {{-- Les boutons --}}
            <div class="flex flex-row justify-center my-2">

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
            <input type="range" min="25" max="100" value="25" class="range" step="5" />
            <div class="w-full flex justify-between text-xs px-2 my-2 ">

                <span id="0.25">|x0,25</span>
                <span id="0.5">|x0.5</span>
                <span id="0.75">|x0.75</span>
                <span id="1">|x1</span>

            </div>


            {{-- Le son --}}
            <div class="flex flex-row">

                {{-- input toggle checkbox mute/unmute --}}

                <i class="fa-solid fa-volume-xmark"></i>
                <input type="checkbox" id="mute-checkbox">


                {{-- progress bar pour le volume --}}
                <input id="volumebar" type="range" min="0" max="100" value="50"
                    class="range range-xs range-primary " step="1" />

            </div>

            {{-- lecture en boucle --}}

            <div class="flex flex-row justify-evenly">

                <div>

                    <!-- boutton A currenttime  -->
                    <button id="A" class="bg-blue-500 w-20 rounded-full"><i class="fa-solid fa-a"></i>
                    </button>

                    <!-- affiche la valeur de A en minute et seconde -->
                    <div id="A-time">
                        <p>A time: <span id="A-time-span"></span>

                    </div>

                </div>


                <div>
                    <!-- boutton B currenttime  -->
                    <button id="B" class="bg-red-500 w-20 rounded-full"><i class="fa-solid fa-b"></i></button>
                    <!-- affiche la valeur de B en minute et seconde  -->
                    <div id="B-time">
                        <p>B time: <span id="B-time-span"></span>
                    </div>
                </div>

                <div>

                    <input type="checkbox" id="loop-checkbox" class="checkbox checkbox-sm">
                    <div class="justify-center">
                        <i class="fa-solid fa-arrow-rotate-left "></i>
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

                function onPlayerStateChange(event) {

                }


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
                document.getElementById('mute-checkbox').addEventListener('change', function() {
                    if (this.checked) {
                        player.mute();
                    } else {
                        player.unMute();
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




        {{-- Le formulaire de memo --}}
        <div class=" flex-col w-full md:w-2/5 sm:my-5">

            {{-- <form action="{{ route('library') }}" method="post" class="flex justify-end">
                                                            @csrf
                                                            <input type="hidden" name="videoId" value="{{ $singleVideo->items[0]->id }}">


                                                            @if (null !== Auth::user())
                                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                            @endif --}}

            {{-- bouton pour ajouter la video à la bibliothèque --}}
            <form action="{{ route('library') }}" method="post" class="flex justify-center">
                            @csrf
                            <input type="hidden" name="videoId" value="{{ $singleVideo->items[0]->id }}">
                            @if (null !== Auth::user())
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            @endif

                            <input type="submit" class="sr-only" value="valider">

                            <button class="mt-4 text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 justify-end font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                                <i class="fa-solid fa-bookmark fa-red-500"></i>   Ajouter à la bibliothèque
                            </button>

            </form>

            <div class="  lg:flex-grow md:w-full  lg:pl-24  flex flex-col md:items-start md:text-left items-center text-center">

                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                    Rédiger un mémo
                </h1>

                <div class="relative mb-4 px-2 md:px-0 lg:px-0 ">

                    <form action="" method="post">
                        @csrf
                        <input type="hidden" name="videoId" value="">
                        @if (!null == Auth::user())
                            <input type="hidden" name="user_id" value="">
                        @endif
                        <textarea id="message" name="message" cols="50" rows="15"
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-64 text-base outline-none text-gray-700 py-1  resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>


                    </form>
                </div>



                <div class="flex flex-row gap-x-3 ">

                    <button
                        class="flex flex-row-reverse  text-white bg-red-500 hover:bg-indigo-600 border-0 py-2 px-6 focus:outline-none  rounded text-lg">
                        Enregistrer
                    </button>


                    <form action="/watch" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="statut" value="1">
                        @if (!null == Auth::user())
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @endif
                        <input type="hidden" name="videoId" value="{{ $singleVideo->items[0]->id }}">

                        <button type="submit"
                            class="flex flex-row-reverse text-white bg-black border-0  py-2 px-6 focus:outline-none  rounded text-lg"
                            aria-required="true" name="submit" id="save">
                            Terminer

                        </button>
                    </form>
                </div>
            </div>
        </div>



    </div>



    {{-- LES MEMOS PUBLICS --}}

    <div class="flex flex-col px-2 w-full mt-5">
        <div class="border-b pb-1 flex justify-between items-center mb-2">
            <span class=" text-base font-semibold uppercase text-gray-700">Les mémos des autres
                utilisateurs</span>
            <img class="w-4 cursor-pointer"
                src="https://p.kindpng.com/picc/s/152-1529312_filter-ios-filter-icon-png-transparent-png.png" />
        </div>

        {{-- Memo user1 --}}
        <div class="flex border-b py-3 cursor-pointer hover:shadow-md px-2 ">

            <img class='w-10 h-10 object-cover rounded-lg' alt='User avatar'
                src='https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=200&q=200'>


            <div class="flex flex-col px-2 w-full">

                <span class="text-sm text-red-500 capitalize font-semibold pt-1">
                    Arnaud
                </span>

                <span class="text-xs text-gray-500 uppercase font-medium ">
                    -"Boston," Augustana
                </span>
            </div>
        </div>

        {{-- Memo user2 --}}
        <div class="flex border-b py-3 cursor-pointer hover:shadow-md px-2 ">


            <img class='w-10 h-10 object-cover rounded-lg' alt='User avatar'
                src='https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=200&q=200'>


            <div class="flex flex-col px-2 w-full">

                <span class="text-sm text-red-500 capitalize font-semibold pt-1">
                    Romain
                </span>
                <span class="text-xs text-gray-500 uppercase font-medium ">
                    -"Boston," Augustana
                </span>
            </div>
        </div>
    @endsection
