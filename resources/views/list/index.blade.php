@extends('layouts.index')
@section('title','Daftar isi')
@section('content')
    <div class="row ">
        @foreach ($items as $item)
        <div class="col-lg-3 col-md-4 col-6 my-3 ">
           <ul >
            <li>
                @if (Route::currentRouteName()=='index.genre')
                <a href="{{ route('show.genre',$item->slug) }}" class="text-decoration-none text-dark">{{ $item->name }} ({{ $item->animes()->count() }})</a>
                @elseif(Route::currentRouteName()=='index.studio')
                <a href="{{ route('show.studio',$item->slug) }}" class="text-decoration-none text-dark">{{ $item->name }}  ({{ $item->animes()->count() }})</a>
                @elseif(Route::currentRouteName()=='index.season')
                <a href="{{ route('show.season',$item->slug) }}" class="text-decoration-none text-dark">{{ $item->name }}  ({{ $item->animes()->count() }})</a>
                @elseif(Route::currentRouteName()=='index.status')
                <a href="{{ route('show.status',$item->slug) }}" class="text-decoration-none text-dark">{{ $item->name }}  ({{ $item->animes()->count() }})</a>
                @else
                <a href="{{ route('show.type',$item->slug) }}" class="text-decoration-none text-dark">{{ $item->name }}  ({{ $item->animes()->count() }})</a>
                @endif
                
            </li>
           </ul>
        </div>
        @endforeach
        
    </div>
@endsection