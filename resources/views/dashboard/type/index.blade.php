@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    {{-- Retrieve the currently authenticated user... --}}
    <h1 class="h2">Post types</h1>
  </div>
  <div class="table-responsive col-lg-6">
    <a href="{{ route('types.create') }}"class="btn btn-primary">Create New type</a>
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
          <th scope="col">type</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($types as $type)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $type->name }}</td>
            <td>
              {{-- '/dashboard/types' url route resource,jadi name nya itu types.show dll --}}
                <a href="{{ route('types.edit',$type->slug) }}" class="badge bg-warning"> <span data-feather="edit">
                  </span>
                </a>
                <form action="{{ route('types.destroy',$type->slug) }}" method="post" class="d-inline">
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