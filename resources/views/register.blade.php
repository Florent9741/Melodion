<!-- Dark mode not enabled -->
<html>
    <head>
      <title>Melodion Register</title>
      <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        <body class="bg-slate-200">
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
          <button id="retour" type="submit" class=" bg-blue-300 justify-center w-24 flex py-2 px-4 mt-10 ml-10 border border-blue-500 text-sm font-semibold rounded-md text-black  hover:bg-lightblue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-50" aria-required="true">
           
            Retour
          </button>
        </div>

<!-- <div class="fb-login-button" >Login with Facebook</div> -->
<div class="min-h-screen flex items-center justify-center  py-12 px-4 sm:px-6 lg:px-8">
 
   
 
    
    <div class="max-w-md w-full space-y-8">
      @if ($errors->any())
          <div class="text-red-600 text-2xl text-left font-semibold">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
       <div>

      
       
        <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
            MELODION
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600 font-semibold">
          REGISTER  or
          <a href="{{route('login') }}" class="font-semibold text-blue-600 hover:text-blue-500">
          Login
          </a>
        </p>
      </div>
      <form class="mt-8 space-y-6" action="{{route('register.action')}}" method="POST">
        @csrf
        <input type="hidden" name="remember" value="true">
        <div class="rounded-md shadow-sm -space-y-px">
            <div>
                <label for="name" class="sr-only">Name</label>
                <input id="name" name="name" type="text"  class="appearance-none rounded relative block w-full px-3 py-2 border my-8 border-black placeholder-gray-500 text-slate-600 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="name" 
                value="{{old('name')}}">
              </div>
            <div>
            <label for="email-address" class="sr-only">Email address</label>
            <input id="email-address" name="email" type="email" autocomplete="email"  class="appearance-none rounded relative block w-full px-3 py-2 my-8 border border-black placeholder-gray-500 text-slate-600 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Email address"
            value="{{old('email')}}" >
          </div>
          <div>
            <label for="password" class="sr-only">Password</label>
            <input id="password" name="password" type="password" autocomplete="current-password"  class="appearance-none rounded relative block w-full px-3 py-2  my-8 border  border-black placeholder-gray-500 text-slate-600  focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Password" >
          </div>
        </div>
  
        <div>
          <button id="signin" type="submit" class=" w-48 flex items-center justify-center py-2 px-4 mx-auto border border-transparent text-sm font-semibold rounded-md text-white bg-black hover:bg-lightblue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-50" aria-required="true">
           
            Register
          </button>
        </div>
      </form>
    </div>
  </div>

  
        </body>
    </head>
</html>