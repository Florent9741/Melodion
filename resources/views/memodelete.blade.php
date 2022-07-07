<form action="/store/{{$id}}" method="post">
    @csrf
    @method('DELETE')
    
    <button type="submit">
        <i class="material-icons-outlined text-base">delete_outline</i>
    </button>
 </form>