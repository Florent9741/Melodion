 <form method="POST" action="/delete/{id}">
   @csrf
                @method('DELETE') 
                
                <!-- Title -->
                <div>
               <!--   <h3 class="text-2xl  text-gray-700 font-semibold mb-2">Etes vous sur de vouloir supprimer le post ?</h3>  -->
                  <div class="flex items-center mb-4 space-x-2">
           <!--       <button type="submit" value='Oui'name="OK" class="bg-blue-600 mr-6">OUI</button> -->
           <input type="hidden" name="id" value="{{$user->id}}">
                  <button type="submit"  class="bg-red-600 shadow-lg shadow-red-600">delete</button>
                </div>
              </form>
