<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Mélodion</title>
    <style>
        .top-bar {
            background-color: #343a40;
            
        }
    </style>
    @yield('css')
  </head>
  <body>


<div class="top-bar">

    <div class="container">
            <div class="row">
                        <div class="col">
                            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                               
                                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                      <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{route('index')}}">Mélodion</a>
                                      </li>
                                      
                                    </ul>
                                    <form class="d-flex" method="GET" action="{{route('results')}}">
                                      <input class="form-control me-2" type="search" name="search_query" placeholder="Search" aria-label="Search">
                                      <button class="btn btn-outline-success" type="submit">Search</button>
                                    </form>
                                  </div>
                                </div>
                                <div class="flex ">
                                  @guest
                                  <a href="/login"
                                     class="block text-md px-4 py-2 rounded text-white ml-2 font-bold hover:text-white mt-4 hover:bg-blue-700 lg:mt-0">Sign
                                      in</a>
                      
                                  <a href="/register"
                                     class=" block text-md px-4  ml-2 py-2 rounded text-white font-bold hover:text-white mt-4 hover:bg-blue-700 lg:mt-0">Sign up</a>
                                     @endguest 
                                     @auth
     
                                     <a href="#"
                                     class="block text-md px-4 py-2 rounded text-white ml-2 font-bold hover:text-white mt-4 hover:bg-blue-700 lg:mt-0">Biblio
                                      </a>
                      
                                  <a href="#"
                                     class=" block text-md px-4  ml-2 py-2 rounded text-white font-bold hover:text-white mt-4 hover:bg-blue-700 lg:mt-0">Dashboard</a>
                                     <a href="{{route('signout')}}"
                                     class=" block text-md px-4  ml-2 py-2 rounded text-white font-bold hover:text-white mt-4 hover:bg-blue-700 lg:mt-0">Sign out</a>
                                     @endauth                                    
                                    </div>
                              </nav>

            </div>
    </div>
</div>
@yield('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>



