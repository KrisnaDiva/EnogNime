@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    {{-- Retrieve the currently authenticated user... --}}
    <h1 class="h2">Post studios</h1>
  </div>
  <div class="table-responsive col-lg-6">
    <a href="{{ route('studios.create') }}"class="btn btn-primary">Create New studio</a>
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
          <th scope="col">studio</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($studios as $studio)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $studio->name }}</td>
            <td>
              {{-- '/dashboard/studios' url route resource,jadi name nya itu studios.show dll --}}
                <a href="{{ route('studios.edit',$studio->slug) }}" class="badge bg-warning"> <span data-feather="edit">
                  </span>
                </a>
                <form action="{{ route('studios.destroy',$studio->slug) }}" method="post" class="d-inline">
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