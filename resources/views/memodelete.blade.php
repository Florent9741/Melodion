<form method="POST" action="/memodelete/{id}">
    @csrf
                 @method('DELETE') 
                 
                 <!-- Title -->
                 <div>
                <!--   <h3 class="mb-2 text-2xl font-semibold text-gray-700">Etes vous sur de vouloir supprimer le post ?</h3>  -->
                   <div class="flex items-center mb-4 space-x-2">
            <!--       <button type="submit" value='Oui'name="OK" class="mr-6 bg-blue-600">OUI</button> -->
            <input type="hidden" name="id" value="{{$user->id}}">
                   <button type="submit"  class="bg-red-600 shadow-lg shadow-red-600">delete</button>
                 </div>
               </form>