@extends('layouts.index')
@section('title','Home')
@section('content')
    <div class="row justify-content-center">
      @foreach ($episodes as $episode)
        <div class="col-lg-3 col-md-4 col-6 my-3">
            <div class="card" >
              <div class="position-absolute  px-3 py-2 " style="background-color: rgba(0,0,0,0.5)">
                <a href="{{ route('show.type',$episode->anime->type->slug) }}" class="text-decoration-none text-white " style="text-shadow:0 0 5px black">
                   {{ $episode->anime->type->name  }}
                </a></div>
                <img src="https://source.unsplash.com/200x134?{{ $episode->anime->slug }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <div class="mb-3">
                    <a href="{{ route('show.anime',$episode->anime->slug) }}" class="card-title h5 text-decoration-none">{{ $episode->anime->title }}</a>
                  </div>
                  <div>
                    <a href="{{ route('show.episode',$episode->slug) }}" class="btn btn-primary">Episode {{ $episode->episode_number }}</a>
                  </div>
                 
                </div>
              </div>
        </div>
        @endforeach
       
        
    </div>
@endsection