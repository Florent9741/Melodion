@extends('master')

@section('content')
    <div class="container mt-4">
        <div class="flex flex-row">
            <div class="w-3/5 flex flex-col">
                <form action="{{ route('library') }}" method="post">
                    @csrf
                    <input type="hidden" name="videoId" value="{{ $singleVideo->items[0]->id }}">
                    @if (null !== Auth::user())
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @endif

                    <input type="submit" class="sr-only" value="valider">
                    <button
                        class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Ajouter
                        à la bibliothèque</button>
                </form>

                <div class="card mb-6  ">
                    <div class=" embed-responsive embed-responsive-16by9">
                        {{-- <iframe src="https://www.youtube.com/embed/{{$singleVideo->items[0]->id}}" width="889" height="500" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                        <div id="monplayer" class="w-full">
                            <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
                            <div class="flex flex-col">

                                <div id="player"></div>
                                <!-- curseur de progression -->
                                <input type="range" id="seek-bar" value="0" max="100" step="1">
                            </div>
                            <!-- affiche le current time -->
                            <div id="currentTime">
                                <p>Current time: <span id="currentTimeSpan"></span>
                                </p>
                            </div>


                            <!-- boutton pour lancer la video -->
                            <button id="play-pause"><img src="images/Play button.png"></button>

                            <span></span>
                            <!-- boutton pour mettre la video en pause -->
                            <button id="pause"><img src="images/Pause Button.png"></button>



                            <!-- boutton pour arreter la video -->
                            <button id="stop"><img src="images/Stop Button.png"></button>

                            <!-- boutton pour rejouer la video -->
                            <button id="replay">Replay</button>



                            <!-- boutton pour mettre la video en plein ecran -->
                            <button id="fullscreen">Fullscreen</button>

                            <!-- boutton pour ralentir la video 0.25 fois  -->
                            <button id="slow25">Slow 0.25</button>

                            <!-- boutton pour ralentir la video  -->
                            <button id="slow">Slow 0.5</button>

                            <!-- boutton pour ralentir la video 0.75 fois -->
                            <button id="slow-75">Slow 0.75</button>

                            <!-- boutton pour vitesse normal -->
                            <button id="normal">Normal</button>



                            <!-- boutton pour mettre la video en mute -->
                            <button id="mute">Mute</button>

                            <!-- boutton pour mettre la video en unmute -->
                            <button id="unmute">Unmute</button>

                            <!-- boutton pour arreter la boucle, false -->
                            <button id="loop-off">Loop off</button>

                            <!-- boutton pour réactiver la boucle -->
                            <button id="loop-on">Loop on</button>




                            <div>

                                <!-- boutton A currenttime  -->
                                <button id="A">A</button>

                                <!-- affiche la valeur de A en minute et seconde -->
                                <div id="A-time">
                                    <p>A time: <span id="A-time-span"></span>

                                </div>

                            </div>
                            <!-- boutton B currenttime  -->
                            <button id="B">B</button>
                            <!-- affiche la valeur de B en minute et seconde  -->
                            <div id="B-time">
                                <p>B time: <span id="B-time-span"></span>
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
                                        videoId: '{{ $singleVideo->items[0]->id }}',


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

                                // boutton pour mettre la video en plein ecran
                                document.getElementById('fullscreen').addEventListener('click', function() {
                                    player.setFullscreen();
                                });

                                // pour ralentir la video à 0.25 fois
                                document.getElementById('slow25').addEventListener('click', function() {
                                    player.setPlaybackRate(0.25);
                                });

                                // boutton pour ralentir la video
                                document.getElementById('slow').addEventListener('click', function() {
                                    player.setPlaybackRate(0.5);
                                });

                                // bouton pour ralentir la video de 0.75 fois
                                document.getElementById('slow-75').addEventListener('click', function() {
                                    player.setPlaybackRate(0.75);
                                });

                                // bouton vitesse normal
                                document.getElementById('normal').addEventListener('click', function() {
                                    player.setPlaybackRate(1);
                                });




                                // boutton pour mettre la video en mute
                                document.getElementById('mute').addEventListener('click', function() {
                                    player.mute();
                                });

                                // boutton pour mettre la video en unmute
                                document.getElementById('unmute').addEventListener('click', function() {
                                    player.unMute();
                                });

                                // bouton fullscreen
                                document.getElementById('fullscreen').addEventListener('click', function() {
                                    player.setFullscreen();

                                });


                                // curseur de progression
                                document.getElementById('seek-bar').addEventListener('change', function() {
                                    player.seekTo(player.getDuration() * (this.value / 100));
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
                                }, 100);

                                // affiche le current time en minute et seconde
                                setInterval(function() {
                                    var currentTime = player.getCurrentTime();
                                    var minutes = Math.floor(currentTime / 60);
                                    var seconds = Math.floor(currentTime % 60);
                                    document.getElementById('currentTimeSpan').innerHTML = minutes + ":" + seconds;
                                }, 1000);



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



                                // boutton pour lancer la boucle
                                document.getElementById('loop-on').addEventListener('click', function() {
                                    boucle = true;
                                });
                                // boutton arreter la boucle
                                document.getElementById('loop-off').addEventListener('click', function() {
                                    boucle = false;
                                });
                            </script>
                        </div>
                        <div class="card-body">
                            <h5>{{ $singleVideo->items[0]->snippet->title }}</h5>
                            <p class="text-secondary">Published at
                                {{ date('d M Y', strtotime($singleVideo->items[0]->snippet->publishedAt)) }}</p>
                            <p>{{ $singleVideo->items[0]->snippet->description }}</p>
                        </div>

                <div class="card mb-6" style="width: 90%">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="https://www.youtube.com/embed/{{$singleVideo->items[0]->id}}" width="600" height="500" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="card-body">
                        <h5>{{$singleVideo->items[0]->snippet->title}}</h5>
                        <p class="text-secondary">Published at {{date('d M Y', strtotime($singleVideo->items[0]->snippet->publishedAt))}}</p>
                        <p>{{$singleVideo->items[0]->snippet->description}}</p>

                    </div>
                </div>
            </div>
                <div class="w-2/5">
                    <div
                        class="lg:flex-grow md:w-full lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900"> Rédiger un mémo
                        </h1>
                        <div class="relative mb-4">
                            <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                            <form action="" method="post">

                                <input type="hidden" name="videoId" value="">

                                <input type="hidden" name="user_id" value="">

                                <textarea id="message" name="message" cols="50" rows="15"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-64 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>


                            </form>
                        </div>

                        <div class="flex justify-center">
                            <button
                                class="inline-flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                Enregistrer </button>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
