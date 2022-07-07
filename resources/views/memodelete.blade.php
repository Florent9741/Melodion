<form action="/delete/{{$memo->id}}" method="post">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id_memos" value="{{$memo->id}}">
    <input type="hidden" name="videoId" value="{{$memo->videoId}}">
    <button type="submit">
        <i class="material-icons-outlined text-base">delete_outline</i>
    </button>
 </form>