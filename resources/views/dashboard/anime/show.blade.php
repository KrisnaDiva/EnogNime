@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    {{-- Retrieve the currently authenticated user... --}}
    <h1 class="h2">{{ $anime->title }} episode :</h1>
  </div>
  <div class="table-responsive col-lg-6">
    <a href="{{ route('episodes.create',$anime->slug) }}"class="btn btn-primary">Create New episode</a>
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">episode</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($episodes as $episode)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $episode->title }}</td>
            <td>
              <a href="{{ route('episodes.edit',$episode->slug) }}" class="badge bg-warning"> <span data-feather="edit">
            </span>
          </a>
          <form action="{{ route('episodes.destroy',$episode->slug) }}" method="post" class="d-inline">
          @method('delete')
          @csrf
          <button  class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')">
            <span data-feather="x-circle"></span>
          </button>
          </form>
                
            </td>
          </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>
@endsection