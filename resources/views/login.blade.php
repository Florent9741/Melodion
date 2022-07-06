<!-- Dark mode not enabled -->
<html>
    <head>
      
      <title> Login Melodion</title>
      <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        
      <body>
            <!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ]
  }
  ```
-->
<div>
  <button id="signin" type="submit" class="flex justify-center w-24 px-4 py-2 mt-10 ml-10 text-sm font-semibold text-black bg-blue-300 border border-blue-500 rounded-md hover:bg-lightblue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-50" aria-required="true">
   <a href="{{route('index')}}" >
   Retour
   </a> </button>
</div>

<div class="flex items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8">
 
   
 
   

    <div class="w-full max-w-md ">
      @if ($errors->any())
      <div class="text-2xl font-semibold text-left text-red-600">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
      @if(session('Echec'))
          <div class="mt-6 mb-4 text-xl font-bold text-left text-red-600">
              {{session('Echec')}}
          </div>
          @endif  
      <div>
    @if (session('status'))
    <div class="mt-20 mb-10 text-3xl font-bold text-left text-green-600">
        {{ session('status') }}
    </div>
     @endif
      
        <h2 class="mt-6 text-3xl font-bold text-center text-black">
MELODION
        </h2>
        
      </div>
      <form class="mt-8 space-y-6" action="{{route('login.action')}}" method="POST">
        @csrf
        <input type="hidden" name="remember" value="true">
        <div class="-space-y-px rounded-md shadow-sm">
          <div>
            <label for="email-address" class="sr-only">Email address</label>
            <input id="email-address" name="email" type="email" autocomplete="email" class="relative block w-full px-3 py-2 my-8 text-gray-900 placeholder-gray-600 border border-black rounded appearance-none rounded-t-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Email address" 
            value="{{old('email')}}">
          </div>
          <div>
            <label for="password" class="sr-only">Password</label>
            <input id="password" name="password" type="password" autocomplete="current-password" class="relative block w-full px-3 py-2 my-8 text-gray-900 placeholder-gray-600 border border-black rounded appearance-none rounded-b-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Password" >
          </div>
        </div>
  
       
  
        <div>
          <button id="signin" type="submit" class="relative flex justify-center w-48 px-4 py-2 m-auto text-sm font-semibold text-white bg-black border border-transparent rounded-md group hover:bg-lightblue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-50" aria-required="true">
           
            Login
          </button>
        </div>
      </form>
    </div>
  </div>

 
        </body>
   
</html>