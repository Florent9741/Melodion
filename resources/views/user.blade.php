@extends('layouts.app')
@section ('main')
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

   <h1 class="titre_crud font-bold my-6 ml-7">Utilisateur MELODION</h1>


        <div class="mb-4">
          @if (session('status'))
          <div class="text-3xl text-left font-bold text-green-600 mt-20 mb-10">
              {{ session('status') }}
          </div>
           @endif

          <div class="flex justify-end mr-9">

            <button class="px-4 py-2 rounded-md font-semibold bg-black text-white hover:bg-gray-900"><a href="/restore">voir les comptes désactivés</a></button>
          </div>
          </div>
     </div>
        <div class="flex-col  w-full">
          <div class=" sm:-mx-6 sm:px-6 lg:-mx-2 lg:px-8 mx-10">
            <div class="inline-block  w-full px-4 place-self-auto ">
              <table  class="w-full justify-around my-24 py-6">

                      <thead class="border-b ">


                  <tr class="text-center">
                   <th >
                      ID</th>
                    <th>
                      name</th>
                    <th>
                      email</th>
                      <th>
                        admin
                      </th>
                    <th >
                      Action</th>
                  </tr>
                </thead>
                @foreach ( $membres as $membre)

                <tbody class=" text-center">

                  <tr>
                    <td class="px-1 py-4 justify-around whitespace-no-wrap">
                      <div >
                        <p>{{$membre-> id}}</p>
                      </div>

                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap ">
                      <div class="text-sm leading-5 text-gray-900"><p>{{$membre->name}}</p>
                      </div>
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap ">
                      <div class="text-sm leading-5 text-gray-900"><p>{{$membre->email}}</p>
                      </div>
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap ">
                      <div class="text-sm leading-5 text-gray-900"><p>{{$membre->admin}}null</p>
                      </div>
                    </td>




                    <td class=" font-medium whitespace-no-wrap flex justify-center pt-5">
                     <div class="text-sm leading-5  "> <a href="/showdelete/{{$membre -> id}}"  target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class=" h-6 text-red-600 hover:text-red-800  "
                          fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg></a>
                     </div>
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

 @endsection
