@extends('master')

@section('content')
 <div class="container mt-4">

    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('index')}}">Mélodion</a>
        </li>
        
      </ul>
    <form class="d-flex" method="GET" action="{{route('results')}}">
        <input class="form-control me-2" type="search" name="search_query" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    <div class="row">
        @foreach ($videoLists->items as $key=>$item)
            

        <div class="col-4">
            <a href="{{route('watch', $item->id->videoId)}}" class="href">
                <div class="card mb-4">
                    <img src="{{$item->snippet->thumbnails->medium->url}}" class="img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-titled">{{\Illuminate\Support\Str::limit($item->snippet->title,$limit=50,$end=' ...')}}</h5>
                    </div>
                    <div class="card-footer text-muted">
                       Published at {{date('d M Y',strtotime($item->snippet->publishTime)) }}
                    </div>
                </div>
            </a> 
        </div>
        @endforeach
       
</div>
</div>   
@endsection