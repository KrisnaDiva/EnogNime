@extends('dashboard.layouts.main')
@section('container')

{{ Auth::user()->email }}
<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit" class="btn btn-primary"><i class="bi bi-box-arrow-in-right"></i> Logout</button>
  </form>  
@endsection

