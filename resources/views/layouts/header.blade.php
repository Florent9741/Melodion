<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>


    <nav class="flex flex-row justify-between items-center flex-wrap bg-black py-2  lg:px-12 shadow ">


                        {{-- titre Melodion cliquable à gauche, permet le retour vers page d'acceuil --}}
                        <div class="">
                            <a href="/" <span class="font-semibold text-white ml-2 ">Melodion</span> </a>
                        </div>



                        {{-- Les boutons à droite  --}}
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

                                <a href="{{ route('user') }}"
                                    class=" block text-md px-4   py-2 rounded text-white font-bold hover:text-white  hover:bg-blue-700 lg:mt-0">Dashboard</a>
                                <a href="{{ route('signout') }}"
                                    class=" block text-md px-4   py-2 rounded text-white font-bold hover:text-white  hover:bg-blue-700 lg:mt-0">Deconnexion</a>
                            @endauth
                        </div>
              </div>
         </div>


</nav>
