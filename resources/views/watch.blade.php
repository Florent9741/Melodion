@extends('layouts.app')

@section('main')
    <div class="container mt-4 sm:flex-col md:flex-row">

    <div class="container mt-4">
        <div class="flex flex-row">
            <div class="w-3/5 flex flex-col">
                <form action="{{ route('library') }}" method="post">
                    @csrf
                    <input type="hidden" name="videoId" value="{{ $singleVideo->items[0]->id }}">


                    @if (null !== Auth::user())
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @endif

        {{-- bouton pour ajouter la video à la bibliothèque --}}
        <form action="{{ route('library') }}" method="post">
            @csrf
            <input type="hidden" name="videoId" value="{{ $singleVideo->items[0]->id }}">
            @if (null !== Auth::user())
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            @endif

            <input type="submit" class="sr-only" value="valider">
            <button
                class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Ajouter
                à la bibliothèque
            </button>

        </form>


        <div id="monplayer">
            <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
            <div style="display: flex; flex-direction: column;">

                <div id="player" class="w-full h-auto"></div>
                <!-- curseur de progression -->
                <input type="range" id="seek-bar" value="0" max="100" step="1">
            </div>
            <!-- affiche le current time -->
            <div>
                <div id="currentTime">
                    <p> <span id="currentTimeSpan"></span>


                     {{-- affiche le total time en minute et seconde --}}
                    : <span id="totalTimeSpan"></span></p>
                </div>
            </div>



            <div class="flex flex-row justify-center my-2">

                <div>
                    <!-- boutton pour lancer la video -->
                    <button id="play-pause"><i class="fa-solid fa-play fa-2xl"></i></button>

                    <!-- boutton pour mettre la video en pause -->
                    <button id="pause"><i class="fa-solid fa-pause fa-2xl"></i></button>

                    <!-- boutton pour arreter la video -->
                    <button id="stop"><i class="fa-solid fa-stop fa-2xl"></i></button>

                    <!-- boutton pour rejouer la video -->
                    <button id="replay"> <i class="fa-solid fa-backward-step fa-2xl text-red-400"></i> </button>

                </div>


            </div>


            {{-- <!-- boutton pour mettre la video en plein ecran -->
            <button id="fullscreen">Fullscreen</button> --}}

            {{-- <!-- boutton pour ralentir la video 0.25 fois  -->
            <button id="slow25">Slow 0.25</button>

            <!-- boutton pour ralentir la video  -->
            <button id="slow">Slow 0.5</button>

            <!-- boutton pour ralentir la video 0.75 fois -->
            <button id="slow-75">Slow 0.75</button>

            <!-- boutton pour vitesse normal -->
            <button id="normal">Normal</button> --}}

            <input type="range" min="25" max="100" value="25" class="range" step="5" />
            <div class="w-full flex justify-between text-xs px-2 my-2 ">

                <span id="0.25">|x0,25</span>
                <span id="0.5">|x0.5</span>
                <span id="0.75">|x0.75</span>
                <span id="1">|x1</span>

            </div>

            {{-- <!-- boutton pour mettre la video en mute -->
            <button id="mute"> <i class="fa-solid fa-volume-xmark"></i> Mute</button>

            <!-- boutton pour mettre la video en unmute -->
            <button id="unmute">Unmute</button> --}}

            {{-- input toggle checkbox mute/unmute --}}

            <i class="fa-solid fa-volume-xmark">
                 <input type="checkbox" id="mute-checkbox" >
                 </i>

            {{-- <!-- boutton pour arreter la boucle, false -->
            <button id="loop-off">Loop off</button>

            <!-- boutton pour réactiver la boucle -->
            <button id="loop-on">Loop on</button> --}}

            {{-- checkbox toggle pour la lecture en boucle
            <input type="checkbox"  id="loop-checkbox"
                /> --}}



            {{-- checkbox toggle pour la lecture en lecture en boucle --}}

            <div class="flex flex-row justify-evenly">

                <div>

                    <!-- boutton A currenttime  -->
                    <button id="A" class="bg-blue-500 w-20 rounded-full"><i class="fa-solid fa-a"></i> </button>

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

                    <input type="checkbox" checked="checked"  id="loop-checkbox" class="checkbox checkbox-md" />
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
                        videoId: '{{$id}}',


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


                // boutton pour lancer la video
                document.getElementById('play-pause').addEventListener('click', function() {
                    player.playVideo();
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

                // boutton pour mettre la video en pause
                document.getElementById('pause').addEventListener('click', function() {
                    player.pauseVideo();
                });

                // // boutton pour mettre la video en plein ecran
                // document.getElementById('fullscreen').addEventListener('click', function() {
                //     player.setFullscreen();
                // });

                // // pour ralentir la video à 0.25 fois
                // document.getElementById('slow25').addEventListener('click', function() {
                //     player.setPlaybackRate(0.25);
                // });

                // // boutton pour ralentir la video
                // document.getElementById('slow').addEventListener('click', function() {
                //     player.setPlaybackRate(0.5);
                // });

                // // bouton pour ralentir la video de 0.75 fois
                // document.getElementById('slow-75').addEventListener('click', function() {
                //     player.setPlaybackRate(0.75);
                // });

                // // bouton vitesse normal
                // document.getElementById('normal').addEventListener('click', function() {
                //     player.setPlaybackRate(1);
                // });


                // {{-- barre range vitesse lecture --}}
                document.getElementsByClassName('range')[0].addEventListener('change', function() {
                    player.setPlaybackRate(this.value / 100);
                });

                // // boutton pour mettre la video en mute
                // document.getElementById('mute').addEventListener('click', function() {
                //     player.mute();
                // });

                // // boutton pour mettre la video en unmute
                // document.getElementById('unmute').addEventListener('click', function() {
                //     player.unMute();
                // });

                // input toggle checkbox mute/unmute
                document.getElementById('mute-checkbox').addEventListener('change', function() {
                    if (this.checked) {
                        player.mute();
                    } else {
                        player.unMute();
                    }
                });


                // curseur de progression
                document.getElementById('seek-bar').addEventListener('change', function() {
                    player.seekTo(player.getDuration() * (this.value / 100));

                });
                // curseur de progression qui avance






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
                }, 100);

                // affiche le current time en minute et seconde
                setInterval(function() {
                    var currentTime = player.getCurrentTime();
                    var minutes = Math.floor(currentTime / 60);
                    var seconds = Math.floor(currentTime % 60);
                    document.getElementById('currentTimeSpan').innerHTML = minutes + ":" + seconds;
                }, 10);

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


            {{-- Le formulaire de memo --}}
            <div class=" flex-col md:w-2/5">
                <div
                    class="  lg:flex-grow md:w-full lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900"> Rédiger un mémo
                    </h1>
                    <div class="relative mb-4">
                        <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                        <form action="" method="post">
@csrf
                            <input type="hidden" name="videoId" value="">
                            <input type="hidden" name="user_id" value="">

                            <textarea id="message" name="message" cols="50" rows="15"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-64 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>


                        </form>
                    </div>


                 </div>
                    <div class="flex  justify-around ">
                        <button class="flex flex-row-reverse ml-24 text-white bg-red-500 hover:bg-indigo-600 border-0 py-2 px-6 focus:outline-none  rounded text-lg">enregistrer</button>
                        <form action="/watch" method="post" enctype="multipart/form-data" >
                            @csrf
                            <input type="hidden" name="statut" value="1">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="videoId" value="{{ $singleVideo->items[0]->id }}">
                        <button type="submit" class="flex flex-row-reverse text-white bg-black border-0  py-2 px-6 focus:outline-none  rounded text-lg" aria-required="true" name="submit" id="save">
                              terminer </button>
                        </form>
                         </div>
                   </div>
            </div>
        </div>


        {{-- LES MEMOS PUBLICS --}}

        <div class="flex flex-col p-5">
            <div class="border-b pb-1 flex justify-between items-center mb-2">
                <span class=" text-base font-semibold uppercase text-gray-700">Les mémos des autres utilisateurs</span>
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
