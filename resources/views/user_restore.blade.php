<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>UserRestore</title>
</head>
<body class="justify-center">
  
   
        <div class="flex flex-col">
            <div class="overflow-x-auto  sm:-mx-6  lg:-mx-8">

              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8"> 
                <div class="overflow-hidden">
                    <table class="min-w-full">
                     
                      <thead class="border-b">
        
                        <tr>
                         <th class="m-20" > 
                            ID</th>
                          <th  class="m-20">
                            name</th>
                          <th  class="m-20">
                            email</th>
                          <th class="m-20">
                            admin
                            </th>
                          
                          <th  class="m-20">
                            Action</th>
                        </tr>
                      </thead>
                      @foreach ( $members as $membre)
                   
                      <tbody class="bg-white text-center">
                        
                        <tr>
                          <td class="px-1 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div >
                              <p>{{$membre->id}}</p>
                            </div>
            
                          </td>
            
                          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-900"><p>{{$membre->name}}</p>
                            </div>
                          </td>
            
                          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <p>{{$membre->email}}</p>
                          </td>
            
                          <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                            <span>null</span>
                          </td>
            <td class="border-b">
                <form method="get" action="{{route('user.restore',$membre->id)}}">

      
        <button type="submit" name="restore" class=" bg-black text-white font-semibold rounded px-3 py-1 justify-center ">restore</button>
        
    </td></form>
       </div> @endforeach

</body>
</html>