@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    {{-- Retrieve the currently authenticated user... --}}
    <h1 class="h2">Create New Episode</h1>
  </div>
  <div class="col-lg-8">
    <form action="{{ route('episodes.store') }}" method="post" class="mb-5" >
        @csrf
        <div class="mb-3">
            <label for="anime_id" class="form-label">Anime id: </label>
            <input type="text" class="form-control @error('anime_id') is-invalid @enderror" id="anime_id" name="anime_id" required  value="{{ old('anime_id',$anime->id) }}" readonly>
            <input type="hidden" name="animeslug" value={{ $anime->slug }}>
            @error('anime_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        <div class="mb-3">
            <label for="name" class="form-label">Judul Anime: </label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required  value="{{ old('name',$anime->title) }}" disabled>
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="title" class="form-label">Title : </label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required  value="{{ old('title',"$anime->title Episode ".$episode+1) }}" onkeyup="createTextSlug(this.id)">
            @error('title')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="episode_number" class="form-label">episode_number</label>
            <input type="text" class="form-control @error('episode_number') is-invalid @enderror" id="episode_number" name="episode_number"   required value="{{old('episode_number',$episode+1)}}">
            @error('episode_number')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"   required value="{{old('slug')}}">
            @error('slug')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="link" class="form-label">Link</label><br>
            <label for="inputlink" class="form-label">Jumlah Link : </label>
            <input type="number" id="inputlink" name="inputlink" oninput="createlink()">
            <div id="link" name="link">
              
            </div>
           
          </div>
       
        <button type="submit" class="btn btn-primary">Create link</button>
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