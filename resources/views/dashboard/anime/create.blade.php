@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    {{-- Retrieve the currently authenticated user... --}}
    <h1 class="h2">Create New Anime</h1>
  </div>
  <div class="col-lg-8">
    <form action="{{ route('animes.store') }}" method="post" class="mb-5" enctype="multipart/form-data" >
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}" onkeyup="createTextSlug(this.id)">
          @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"   required value="{{ old('slug') }}">
          @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Post Image</label>
          <img class="img-preview img-fluid mb-3 col-sm-5">
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="trailer" class="form-label">Trailer</label>
          <input type="text" class="form-control @error('trailer') is-invalid @enderror" id="trailer" name="trailer"   required value="{{ old('trailer') }}">
          @error('trailer')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="status_id" class="form-label">Status</label>
          <select class="form-select" name="status_id">
            @foreach ($statuses as $status)
            <option value="{{ $status->id }}" {{ old('status_id')==$status->id ? 'selected':'' }}>{{ $status->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="type_id" class="form-label">Type</label>
          <select class="form-select" name="type_id">
            @foreach ($types as $type)
            <option value="{{ $type->id }}" {{ old('type_id')==$type->id ? 'selected':'' }}>{{ $type->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="season_id" class="form-label">season</label>
          <select class="form-select" name="season_id">
            @foreach ($seasons as $season)
            <option value="{{ $season->id }}" {{ old('season_id')==$season->id ? 'selected':'' }}>{{ $season->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="genre" class="form-label">Genre</label><br>
          <label for="inputGenre" class="form-label">Jumlah Genre : </label>
          <input type="number" id="inputGenre" name="inputGenre" oninput="createGenre()">
          <div id="genre" name="genre">
            
          </div>
         
        </div>
        <div class="mb-3">
          <label for="studio" class="form-label">Studio</label><br>
          <label for="inputStudio" class="form-label">Jumlah Studio : </label>
          <input type="number" id="inputStudio" name="inputStudio" oninput="createStudio()">
          <div id="studio" name="studio">
            
          </div>
         
        </div>

        <div class="mb-3">
          <label for="synopsis" class="form-label">Synopsis</label>
          <input type="text" class="form-control @error('synopsis') is-invalid @enderror" id="synopsis" name="synopsis"   required value="{{ old('synopsis') }}">
          @error('synopsis')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="rating" class="form-label">rating</label>
          <input type="text" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating"   required value="{{ old('rating') }}">
          @error('rating')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="total_episode" class="form-label">total episode</label>
          <input type="text" class="form-control @error('total_episode') is-invalid @enderror" id="total_episode" name="total_episode"   required value="{{ old('total_episode') }}">
          @error('total_episode')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="duration" class="form-label">duration</label>
          <input type="text" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration"   required value="{{ old('duration') }}">
          @error('duration')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="release" class="form-label">release</label>
          <input type="date" class="form-control @error('release') is-invalid @enderror" id="release" name="release"   required value="{{ old('release') }}">
          @error('release')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
       
        <button type="submit" class="btn btn-primary">Create Anime</button>
      </form>
  </div>
  <script>

function createGenre() {
  var number = document.getElementById("inputGenre").value;
  var selectsDiv = document.getElementById("genre");
  selectsDiv.innerHTML = ""; // Reset selectsDiv

  var select = document.createElement("select");
  select.setAttribute("class", "form-select");
  select.setAttribute("name", "genre");

  @foreach ($genres as $genre)
    var option = document.createElement("option");
    option.value = "{{ $genre->id }}";
    option.text = "{{ $genre->name }}";
    option.selected = "{{ old('genre')==$genre->id ? 'selected':'' }}";
    select.appendChild(option);
  @endforeach

  for (var i = 1; i <= number; i++) {
    var clone = select.cloneNode(true);
    clone.setAttribute("name", "genre" + i);
    clone.setAttribute("id", "genre" + i);
    selectsDiv.appendChild(clone);
  }
}
function createStudio() {
  var number = document.getElementById("inputStudio").value;
  var selectsDiv = document.getElementById("studio");
  selectsDiv.innerHTML = ""; // Reset selectsDiv

  var select = document.createElement("select");
  select.setAttribute("class", "form-select");
  select.setAttribute("name", "studio");

  @foreach ($studios as $studio)
    var option = document.createElement("option");
    option.value = "{{ $studio->id }}";
    option.text = "{{ $studio->name }}";
    option.selected = "{{ old('studio')==$studio->id ? 'selected':'' }}";
    select.appendChild(option);
  @endforeach

  for (var i = 1; i <= number; i++) {
    var clone = select.cloneNode(true);
    clone.setAttribute("name", "studio" + i);
    clone.setAttribute("id", "studio" + i);
    selectsDiv.appendChild(clone);
  }
}

   
    
        function previewImage(){
    const image=document.querySelector('#image');
    const imgPreview=document.querySelector('.img-preview');
    
    imgPreview.style.display='block';

    const oFReader=new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
      imgPreview.src=oFREvent.target.result; 
    }
  }
    </script>
    
    
    
 {{-- <script>
  const title= document.querySelector('#title');
  const slug= document.querySelector('#slug');

  title.addEventListener('change',function (){
    fetch('/dashboard/posts/checkSlug?title='+title.value).then(response => response.json()).then(data => slug.value = data.slug)
  });

  // mematikan input file trix
  document.addEventListener('trix-file-accept',function(e){
    e.preventDefault();
  });

  function previewImage(){
    const image=document.querySelector('#image');
    const imgPreview=document.querySelector('.img-preview');
    
    imgPreview.style.display='block';

    const oFReader=new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
      imgPreview.src=oFREvent.target.result; 
    }
  }
 </script> --}}
@endsection