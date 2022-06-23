<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UserRestore</title>
</head>
<body>
   @foreach ($members as $membre)
       
    <form action="{{route('restore',$membre ->id)}}" method="GET">
        @csrf
        <div>
         <p>{{$membre->name}}</p>
        </div>
        <input type="hidden" name="id" value="{{$membre ->id}}" />
       <input type="submit" class="sr-only" value="validate" />
        <button type="submit" name="restore" id="restore" class="btn btn-primary">Restore</button>
        </form>
    @endforeach
   
</body>
</html>