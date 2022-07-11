<form action="/delete/{{$memo->id}}" method="post">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id_memos" value="{{$memo->id}}">
    <input type="hidden" name="videoId" value="{{$memo->videoId}}">
    <button type="submit">
        <i class="fa-solid fa-trash-can"></i>
        
    </button>
 </form>