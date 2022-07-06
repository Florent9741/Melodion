<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>


    <nav class="flex flex-row justify-between items-center flex-wrap bg-black py-2  lg:px-12 shadow ">


                        {{-- titre Melodion cliquable à gauche, permet le retour vers page d'acceuil --}}
                        <div class="">
                            <a href="/" <span class="font-semibold text-white ml-2 ">Melodion</span> </a>
                        </div>



                        Les boutons à droite
                        <div class="flex flex-row items-center m-0">

                            {{-- Affiche les boutons "connexion" et "inscription" si l'utilisateur n'est pas connecté --}}
                            @guest
                                <a href="/login"
                                    class="block text-md px-4 py-2 rounded text-white ml-2 font-bold hover:text-white  hover:bg-blue-700 lg:mt-0">
                                    Connexion</a>


                                <a href="/register"
                                    class=" block text-md px-4  ml-2 py-2 rounded text-white font-bold hover:text-white  hover:bg-blue-700 lg:mt-0">Inscription</a>
                            @endguest

                                {{-- Affiche les boutons "deconnexion" et de "profil" si l'utilisateur est connecté --}}
                            @auth
                                <a href="{{ route('biblio', Auth::user()->id) }}"
                                    class="block text-md px-4 py-2 rounded text-white  font-bold hover:text-white  hover:bg-blue-700 lg:mt-0">Biblio
                                </a>
                                @if (Auth::user()->admin == 1)
                                <a href="{{ route('user') }}"
                                    class=" block text-md px-4   py-2 rounded text-white font-bold hover:text-white  hover:bg-blue-700 lg:mt-0">Dashboard</a>
                               @endif
                                    <a href="{{ route('signout') }}"

                                    class=" block text-md px-4   py-2 rounded text-white font-bold hover:text-white  hover:bg-blue-700 lg:mt-0">Deconnexion</a>
                            @endauth
                        </div>

                        <div class="flex justify-end fa-2xl mr-5">
                            <i class="fa-solid fa-circle-user text-red-500 "></i>
                            <button id="dropdownDefault" data-dropdown-toggle="dropdown" class=" bg-white focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center " type="button"><i class="fa-solid fa-ellipsis-vertical fa-xl hover:text-red-500"></i><button>
                            <!-- Dropdown menu -->
                            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 ">
                                <ul class="py-1 text-sm font-semibold text-black  " aria-labelledby="dropdownDefault">
                                    @guest

                                    <li>
                                        <a href="{{route('index')}}" class="block px-4 py-2  hover:text-red-500">Connexion</a>
                                    </li>

                                    <li>
                                        <a href="{{route('index')}}" class="block px-4 py-2  hover:text-red-500">Inscription</a>
                                    </li>
                                    @endguest
                                  <li>
                                    <a href="{{route('index')}}" class="block px-4 py-2  hover:text-red-500">Accueil</a>
                                  </li>
                                  @auth

                                  <li>
                                      <a href="{{route('biblio', Auth::user()->id)}}" class="block px-4 py-2 hover:text-red-500">Bibliothèque</a>
                                    </li>

                                    <li>
                                        <a href="{{route('user')}}" class="block px-4 py-2 hover:text-red-500">Dashboard</a>
                                    </li>

                                    <li>
                                        <a href="{{route('signout')}}" class="block px-4 py-2 hover:text-red-500">Sign Out</a>
                                    </li>
                                    @endauth
                                </ul>
                            </div>
                            </div>
                            </div>
                            <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

              </div>
         </div>


</nav>
