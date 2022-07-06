@extends('master')

@section('content')
<div class="flex justify-end fa-2xl mr-5">
<i class="fa-solid fa-circle-user text-red-500 "></i>
<button id="dropdownDefault" data-dropdown-toggle="dropdown" class=" bg-white focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center " type="button"><i class="fa-solid fa-ellipsis-vertical fa-xl hover:text-red-500"></i><button>
<!-- Dropdown menu -->
<div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 ">
    <ul class="py-1 text-sm font-semibold text-black  " aria-labelledby="dropdownDefault">
      <li>
        <a href="{{route('index')}}" class="block px-4 py-2  hover:text-red-500">Accueil</a>
      </li>
      <li>
        <a href="{{route('biblio', Auth::user()->id)}}" class="block px-4 py-2 hover:text-red-500">Bibliothèque</a>
      </li>
      <li>
        <a href="{{route('user')}}" class="block px-4 py-2 hover:text-red-500">Dashboard</a>
      </li>
      <li>
        <a href="{{route('signout')}}" class="block px-4 py-2 hover:text-red-500">Sign Out</a>
      </li>
    </ul>
</div>
</div>
</div>
<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

@endsection