<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
  <title>ShowDelete</title>
</head>
<body>


<form method="POST" action="/user/{{$membre-> id}}">
    @csrf
         @method ('DELETE')      
                 
                 <!-- Title -->
                 <div class="h-screen items-center justify-center">
               <h3 class="text-2xl  text-gray-700 font-semibold mt-6 mb-2 text-center">Etes vous sur de vouloir supprimer le livre ?</h3>  
                   <div class="flex  mb-4 space-x-2">
          <button type="submit"  class="bg-blue-600 mr-6">NON</button>
            <input type="hidden" name="id" value="{{$membre->id}}">
                   <button type="submit"  class="bg-red-600 shadow-lg shadow-red-600">OUI</button>
                 </div>
               </form>
 {{-- la methode delete ne fonctionne seulement dans le dossier source qui est ici 'livres' 
on creer un page intermediaire pour confirmer la demande , par securité , 
mais on repart sur le page source pour faire laction delete ,
faire attention aux chemins dans les form et les routes et fonctions !!!!  --}}
</body>
</html>