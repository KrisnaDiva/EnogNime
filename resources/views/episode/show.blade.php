@extends('layouts.index')
@section('title','Anime')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <p class="card-header">{{ $episode->title }}</p>
                <div class="card-body">
                  <p class="card-text"><a href="{{ route('show.anime',$episode->anime->slug) }}" class="text-decoration-none">{{ $episode->anime->title }}</a>  /  Posted By {{ $episode->user->name }}  /  {{ $episode->created_at->diffForHumans() }}</p>
                  <div class="ratio ratio-16x9">
                    <iframe id="videoIframe" src="" title="YouTube video" allowfullscreen></iframe>
                  </div>
                  
                  @foreach ($episode->links as $link)
                    <a href="#" onclick="changeVideo('{{ $link->url }}'); return false;">Server {{ $loop->iteration }}</a>
                  @endforeach
                  
                </div>
            </div>
        </div>
        <div class="col-md-8 ">
            <div class="card my-3 p-2">
                <div class="row g-0">
                    <div class="col-md-4 mt-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ $episode->anime->image }}" class="img-fluid" alt="...">
                          </div>
                          <div class="mt-3">
                            <p class="card-text text-center">{{ $episode->anime->rating }}   /  10</p>
                          </div>
                    </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{ $episode->anime->title }}</h5>
                      <p class="card-text">{{ $episode->anime->type->name }}   /   {{ $episode->anime->status->name }}   /   {{ $episode->anime->duration }} min   /   {{ $episode->anime->season->name }}</p>
                      <h6 class="card-title">Sinopsis</h5>
                        <p class="card-text">{!!  $episode->anime->synopsis  !!}</p>
                    @foreach ($episode->anime->genres()->get() as $genre)
                    <a href="{{ route('show.genre',$genre->slug) }}" class="border border-dark text-decoration-none text-dark bg-secondary px-2 py-1">{{ $genre->name }}</a>    
                    @endforeach
                   
                    </div>
                  </div>
                </div>
              </div>
        </div>

    </div>
    <script>
      function changeVideo(url) {
        var videoIframe = document.getElementById('videoIframe');
        videoIframe.src = url;
      }
    </script>
@endsection