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
  <button id="signin" type="submit" class="bg-blue-300 w-24 flex justify-center py-2 px-4 mt-10 ml-10 border border-blue-500 text-sm font-semibold rounded-md text-black hover:bg-lightblue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-50" aria-required="true">
   <a href="/" >
   Retour
   </a> </button>
</div>

<div class="min-h-screen flex items-center justify-center px-4  sm:px-6 lg:px-8">
 
   
 
   

    <div class="max-w-md w-full ">
      @if ($errors->any())
      <div class="text-red-600 text-2xl text-left font-semibold">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
      @if(session('Echec'))
          <div class="text-xl text-left font-bold text-red-600 mt-6 mb-4">
              {{session('Echec')}}
          </div>
          @endif  
      <div>
    @if (session('status'))
    <div class="text-3xl text-left font-bold text-green-600 mt-20 mb-10">
        {{ session('status') }}
    </div>
     @endif
      
        <h2 class="mt-6 text-center text-3xl font-bold text-black">
MELODION
        </h2>
        
      </div>
      <form class="mt-8 space-y-6" action="{{route('login.action')}}" method="POST">
        @csrf
        <input type="hidden" name="remember" value="true">
        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <label for="email-address" class="sr-only">Email address</label>
            <input id="email-address" name="email" type="email" autocomplete="email" class="appearance-none rounded relative block w-full px-3 py-2 my-8 border border-black placeholder-gray-600 text-gray-900 rounded-t-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Email address" 
            value="{{old('email')}}">
          </div>
          <div>
            <label for="password" class="sr-only">Password</label>
            <input id="password" name="password" type="password" autocomplete="current-password" class="appearance-none rounded relative block w-full px-3 py-2 my-8 border border-black placeholder-gray-600 text-gray-900 rounded-b-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Password" >
          </div>
        </div>
  
       
  
        <div>
          <button id="signin" type="submit" class="group relative w-48 flex justify-center py-2 px-4 m-auto border border-transparent text-sm font-semibold rounded-md text-white bg-black hover:bg-lightblue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-50" aria-required="true">
           
            Login
          </button>
        </div>
      </form>
    </div>
  </div>

 
        </body>
   
</html>