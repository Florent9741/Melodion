

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
  <title>User</title>
</head>
<body>
  




 <body>
  <div class="main">
 
    <div class="container w-full">
        <div class="mb-4">
          <h1 class="titre_crud">USER MELODION</h1>
      
          </div> 
        </div>
        <div class="flex flex-col shadow-xl">
          <div class=" sm:-mx-6 sm:px-6 lg:-mx-2 lg:px-8">
            <div class="inline-block min-w-full  align-center  rounded-lg bg-white shadow-md shadow-white sm:rounded-lg">
              <table class="min-w-full">
               
                <thead>
  
                  <tr>
                   <th > 
                      ID</th>
                    <th>
                      name</th>
                    <th>
                      email</th>
                    <th>
                      admin
                      </th>
                    
                    <th class="mx-6 px-3" colspan="2">
                      Action</th>
                  </tr>
                </thead>
                @foreach ( $membres as $membre)
             
                <tbody class="bg-white text-center">
                  
                  <tr>
                    <td class="px-1 py-4 whitespace-no-wrap border-b border-gray-200">
                      <div >
                        <a href="/user/{{$membre -> id}}">{{$membre-> id}}</a>
                      </div>
      
                    </td>
      
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                      <div class="text-sm leading-5 text-gray-900"><a href="/crudfilm/{{$membre-> id}}">{{$membre->name}}</a>
                      </div>
                    </td>
      
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                      <p>{{$membre->email}}</p>
                    </td>
      
                    <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                      <span>null</span>
                    </td>
      
                    <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                      <a href="/Read/{{$membre -> id}}" target="_blank" class="text-gray-600 hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                      </a>
      
                    </td>
      
                    </td>
                    <td class="text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200 ">
                      <a href="/showdelete/{{$membre -> id}}" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600 hover:text-red-800"
                          fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg></a>
      
                    </td>
                  </tr>
                </tbody>
                  @endforeach
               
                </table>

            </div>
          </div>
    </div>
  </div>
</div>
        </body>
      </html>

              