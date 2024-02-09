@extends('layouts.index')
@section('title', 'Anime')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-4 p-2">
                <div class="row g-0">
                    <div class="col-md-4 mt-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ asset('storage/'.$anime->image) }}" class="img-fluid"
                                alt="...">
                        </div>
                        <div class="mt-3">
                            <p class="card-text text-center">{{ $anime->rating }} / 10</p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $anime->title }}</h5>
                            <p class="card-text">{{ $anime->type->name }} / {{ $anime->status->name }} /
                                {{ $anime->duration }} min / {{ $anime->season->name }}</p>
                            <h6 class="card-title">Sinopsis</h5>
                                <p class="card-text">{!! $anime->synopsis !!}</p>
                                @foreach ($anime->genres()->get() as $genre)
                                    <a href="{{ route('show.genre', $genre->slug) }}"
                                        class="border border-dark text-decoration-none text-dark bg-secondary px-2 py-1">{{ $genre->name }}</a>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 my-4">
            <table class="table table-bordered table-hover">
                <tr>
                    <td class="h6">Title</td>
                    <td>{{ $anime->title }}</td>
                </tr>
                <tr>
                    <td class="h6">Sumber</td>
                    <td>MAL</td>
                </tr>
                <tr>
                    <td class="h6">Total Episode</td>
                    <td>{{ $anime->total_episode }}</td>
                </tr>
                <tr>
                    <td class="h6">Release</td>
                    <td>{{ $anime->release }}</td>
                </tr>
                <tr>
                    <td class="h6">Studio</td>
                    <td>
                        @foreach ($anime->studios()->get() as $studio)
                            <a href="{{ route('show.studio', $studio->slug) }}"
                                class="border border-dark text-decoration-none text-dark bg-secondary px-2 py-1">{{ $studio->name }}</a>
                        @endforeach
                    </td>
                </tr>
            </table>
        </div>

        <div class="col-md-8 ">
            <div class="ratio ratio-16x9">
                <iframe src={{ $anime->trailer }} title="YouTube video"
                    allowfullscreen></iframe>
            </div>
        </div>

        <div class="col-md-8 my-4">
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title">Daftar Episode Anime {{ $anime->title }}</h5>
            
          </div>
          <ul class="list-group overflow-auto" {!! count($episodes)>3 ? 'style="height: 200px"' : '' !!} >
            @foreach ($episodes as $episode)
            <li class="list-group-item d-flex align-items-center">
              <a class="btn btn-danger p-2 me-3 d-flex align-items-center justify-content-center"style="width:50px;height:50px;" href="{{ route('show.episode', $episode->slug) }}">{{ $episode->episode_number }}
              </a>
              <div class="d-flex align-content-center flex-wrap ">
                <a class="list-group-item-action text-decoration-none"
                    href="{{ route('show.episode', $episode->slug) }}">
                    {{ $episode->title }}
                </a>
                <small class="text-muted">{{ $episode->created_at->format('m/d/Y') }}</small>
              </div>
          </li>
            @endforeach
          </ul>
        </div>
        </div>
           


    </div>
    @endsection
