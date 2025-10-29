@extends('auth.layouts')

@section('content')
<div class="col-md-6 mx-auto mt-5">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Halo, {{ auth()->user()->name }}!</strong> {{ session('success') }}
        </div>
    @else
        <div class="alert alert-primary fw-semibold">
            Selamat datang, {{ auth()->user()->name }}!
        </div>
    @endif
</div>
@endsection
