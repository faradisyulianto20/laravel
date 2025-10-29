@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2>Edit Data Buku</h2>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Terjadi kesalahan input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT') <div class="row">
            <div class="col-md-6 mb-3">
                <label for="judul" class="form-label">Judul:</label>
                <input type="text" name="judul" value="{{ $buku->judul }}" class="form-control" id="judul" placeholder="Judul">
            </div>
            <div class="col-md-6 mb-3">
                <label for="penulis" class="form-label">Penulis:</label>
                <input type="text" name="penulis" value="{{ $buku->penulis }}" class="form-control" id="penulis" placeholder="Penulis">
            </div>
            <div class="col-md-6 mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="number" name="harga" value="{{ $buku->harga }}" class="form-control" id="harga" placeholder="Harga">
            </div>
            <div class="col-md-6 mb-3">
                <label for="tgl_terbit" class="form-label">Tanggal Terbit:</label>
                <input type="date" name="tgl_terbit" value="{{ $buku->tgl_terbit }}" class="form-control" id="tgl_terbit">
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-secondary" href="{{ route('buku.index') }}">Kembali</a>
            </div>
        </div>
    </form>
@endsection