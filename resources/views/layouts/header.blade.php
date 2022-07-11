

<nav class="flex md:flex-row justify-between items-center flex-wrap  bg-black py-2  lg:px-12 shadow ">


    {{-- titre Melodion cliquable à gauche, permet le retour vers page d'acceuil --}}
    <div class="sm:order-1 flex w-full md:w-auto justify-center md:justify-start align-center pt-1 pb-3">
        <a href="/"> <span class=" w-full font-semibold text-2xl text-white ml-2  ">Melodion</span> </a>
    </div>

    <form class="d-flex w-3/5 pl-2 md:w-2/5 md:justify-center items-center sm:order-2" method="GET" action="{{ route('results') }}">
        <input class=" w-full h-7 rounded-full form-control me-2" type="search" name="search_query" placeholder="Recherchez une video ou une URL.." aria-label="Search">
        <button class="btn  md:hidden items-center justify-center" type="submit">  <i class="fa-solid fa-magnifying-glass text-green-600 "></i> </button>
    </form>


    <div class="  sm:order-3 flex justify-end gap-1 fa-2xl mr-2">
       @guest <i class="fa-solid fa-circle-user text-gray-500 "></i> @endguest
       @auth <i class="fa-solid fa-circle-user text-red-500 "></i> @endauth
        <button id="dropdownDefault" data-dropdown-toggle="dropdown"
            class=" bg-white focus:outline-none font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center "
            type="button"><i class="fa-solid fa-ellipsis-vertical fa-xl hover:text-red-500"></i><button>
                <!-- Dropdown menu -->
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 ">
                    <ul class="py-1 text-sm font-semibold text-black  " aria-labelledby="dropdownDefault">
                        @guest

                            <li>
                                <a href="{{ route('login') }}" class="block px-4 py-2  hover:text-red-500">Connexion</a>
                            </li>

                            <li>
                                <a href="{{ route('register') }}"
                                    class="block px-4 py-2  hover:text-red-500">Inscription</a>
                            </li>
                        @endguest
                        <li>
                            <a href="{{ route('index') }}" class="block px-4 py-2  hover:text-red-500">Accueil</a>
                        </li>
                        @auth

                        <li>
                            {{Auth::user()->name}}
                        </li>
                            <li>
                                @if (!null==Auth::user())
                                <a href="/biblio/{{Auth::user()->id}}" class="block px-4 py-2 hover:text-red-500">Bibliothèque</a>
                            @endif
                           </li>
                           @if (Auth::user()->admin == 1)
                            <li>
                                <a href="{{ route('user') }}" class="block px-4 py-2 hover:text-red-500">Tableau de bord</a>
                            </li>
                            @endif


                            <li>
                                <a href="{{ route('signout') }}" class="block px-4 py-2 hover:text-red-500">Deconnexion</a>
                            </li>
                        @endauth
                    </ul>
                </div>
    </div>

    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>






</nav>

