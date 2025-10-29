@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2>Tambah Buku Baru</h2>
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

    <form action="{{ route('buku.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="judul" class="form-label">Judul:</label>
                <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukkan Judul">
            </div>
            <div class="col-md-6 mb-3">
                <label for="penulis" class="form-label">Penulis:</label>
                <input type="text" name="penulis" class="form-control" id="penulis" placeholder="Masukkan Nama Penulis">
            </div>
            <div class="col-md-6 mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="number" name="harga" class="form-control" id="harga" placeholder="Masukkan Harga">
            </div>
            <div class="col-md-6 mb-3">
                <label for="tgl_terbit" class="form-label">Tanggal Terbit:</label>
                <input type="date" name="tgl_terbit" class="form-control" id="tgl_terbit">
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-secondary" href="{{ route('buku.index') }}">Kembali</a>
            </div>
        </div>
    </form>
@endsection