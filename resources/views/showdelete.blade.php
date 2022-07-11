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


<form method="POST" action="/user/{{$membre-> id}}">
    @csrf
         @method ('DELETE')      
                 
                 <!-- Title -->
                 <div class="items-center justify-center h-screen ">
               <h3 class="justify-center mt-6 mb-2 text-2xl font-semibold text-center text-black">Etes vous sur de vouloir supprimer l'utilisateur ?</h3>  
                   <div class="flex justify-center mb-4 space-x-8 text-center">
              <input type="submit" name="annuler" value="NON" class="w-12 px-2 py-2 mt-20 mb-20 text-sm font-semibold text-center text-black bg-blue-300 border rounded-md">
              <input type="submit" name="submit" value="OUI" class="w-12 px-2 py-2 mt-20 mb-20 text-sm font-semibold text-center text-black bg-red-400 border rounded-md">
                <input type="hidden" name="id" value="{{$membre->id}}">  
              </div>
               </form>
 {{-- la methode delete ne fonctionne seulement dans le dossier source qui est ici 'livres' 
on creer un page intermediaire pour confirmer la demande , par securité , 
mais on repart sur le page source pour faire laction delete ,
faire attention aux chemins dans les form et les routes et fonctions !!!!  --}}
</body>

@endsection