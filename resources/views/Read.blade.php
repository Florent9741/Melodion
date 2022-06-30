<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ReadUser</title>
</head>

<body>
    

<div>
    <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-700 sm:justify-center sm:pt-0">
  
      <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-gray-400 shadow-md shadow-gray-400 rounded-lg lg:max-w-4xl">
  
        <div class="mb-4">
          <h1 class="font-serif text-3xl text-red-700 font-bold underline decoration-white">Show Film</h1>
        </div>
  
        <div class="w-full px-6 py-4 bg-white rounded shadow-md  shadow-white ring-1 ring-gray-900/10">
          <form method="POST" action="/Read/{{$user->id}}">
            <!-- Title -->
            <div>
              <h3 class="text-2xl  text-gray-700 font-semibold">{{$user->mame}}</h3>
             
              </div>
             
              <p class="text-base text-gray-700">{{$user->email}} </p>
             <p>{{$user->admin}}</p>
              
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



 
    




</body>
</html>