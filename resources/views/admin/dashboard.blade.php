@extends('admin.layouts')

@section('content')
<div class="col-md-6 mx-auto mt-5">
    <div class="alert alert-danger fw-semibold">
        Hello {{ auth()->user()->name }} — Welcome to the Admin Dashboard!
    </div>
</div>
@endsection