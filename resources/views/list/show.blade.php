@extends('layouts.index')
@section('title','Genre')
@section('content')
<div class="row justify-content-center">
  @foreach ($item->animes()->get() as $anime)
  <div class="col-lg-3 col-md-4 col-6 my-3">
    <div class="card" >
      <div class="position-absolute  px-3 py-2 " style="background-color: rgba(0,0,0,0.5)">
        <a href="{{ route('show.type',$anime->type->slug) }}" class="text-decoration-none text-white " style="text-shadow:0 0 5px black">
           {{ $anime->type->name  }}
        </a></div>
      <div class="position-absolute end-0 px-3 py-2 " style="background-color: rgba(0,0,0,0.5)">
        <p class="d-inline bi bi-star-fill" style="color:#ffc404;"> {{ $anime->rating  }}</p>
        </div>
        <img src="{{ asset('storage/'.$anime->image) }}" class="card-img-top" alt="...">
        <div class="card-body">
         
            <a href="{{ route('show.anime',$anime->slug) }}" class="card-title h5 text-decoration-none d-block">{{ $anime->title }}</a>
          <small ><a href="{{ route('show.status',$anime->status->slug) }}" class="text-decoration-none text-muted">{{ $anime->status->name }}</a></small>
          
        </div>
      </div>
</div>
  @endforeach
  
</div>
@endsection