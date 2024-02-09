@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    {{-- Retrieve the currently authenticated user... --}}
    <h1 class="h2">Update Episode</h1>
  </div>
  <div class="col-lg-8">
    <form action="{{ route('episodes.update',$episode->slug) }}" method="post" class="mb-5" >
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="anime_id" class="form-label">Anime id: </label>
            <input type="text" class="form-control @error('anime_id') is-invalid @enderror" id="anime_id" name="anime_id" required  value="{{ old('anime_id',$episode->anime_id) }}" readonly>
            @error('anime_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        <div class="mb-3">
            <label for="name" class="form-label">Judul Anime: </label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required  value="{{ old('name',$episode->title) }}" disabled>
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="title" class="form-label">Title : </label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required  value="{{ old('title',$episode->title) }}" onkeyup="createTextSlug(this.id)">
            @error('title')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="episode_number" class="form-label">episode_number</label>
            <input type="text" class="form-control @error('episode_number') is-invalid @enderror" id="episode_number" name="episode_number"   required value="{{old('episode_number',$episode->episode_number)}}">
            @error('episode_number')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"   required value="{{old('slug',$episode->slug)}}">
            @error('slug')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="link" class="form-label">Link</label><br>
            <div id="link" name="link">
                @foreach ($links as $link)
                <input type="text" class="form-control" value="{{ $link->url }}" name="link{{$loop->iteration}}">
                @endforeach
              </div>
           
          </div>
       
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>

  <script>
  function createlink() {
  var number = document.getElementById("inputlink").value;
  var selectsDiv = document.getElementById("link");
  selectsDiv.innerHTML = ""; // Reset selectsDiv

  for (var i = 1; i <= number; i++) {
    var input = document.createElement("input");
    input.setAttribute("type", "text");
    input.setAttribute("class", "form-control");
    input.setAttribute("name", "link" + i);
    input.setAttribute("id", "link" + i);
    input.setAttribute("placeholder", "Enter link " + i);

    selectsDiv.appendChild(input);
  }
}

  </script>
@endsection