@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    {{-- Retrieve the currently authenticated user... --}}
    <h1 class="h2">Post animes</h1>
  </div>
  <div class="table-responsive col-lg-6">
    <a href="{{ route('animes.create') }}"class="btn btn-primary">Create New anime</a>
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
          <th scope="col">anime</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($animes as $anime)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $anime->title }}</td>
            <td>
              {{-- '/dashboard/animes' url route resource,jadi name nya itu animes.show dll --}}
             
              <a href="{{ route('animes.show',$anime->slug) }}" class="badge bg-success"> <span data-feather="eye">
              </span>
            </a>
                <a href="{{ route('animes.edit',$anime->slug) }}" class="badge bg-warning"> <span data-feather="edit">
                  </span>
                </a>
                <form action="{{ route('animes.destroy',$anime->slug) }}" method="post" class="d-inline">
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