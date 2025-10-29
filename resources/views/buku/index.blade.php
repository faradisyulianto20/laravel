@extends('layout.master')

@section('title', 'Contoh Page')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Judul</th>
            <th scope="col">Pengarang</th>
            <th scope="col">Tanggal Terbit</th>
            <th scope="col">Harga</th>
            <th scope="col">Edit</th>
            <th scope="col">Hapus</th>
        </tr>
    </thead>
    <tbody>
        @forelse($data_buku as $index => $buku)
        <tr>
            <th>{{ $index + 1 }}</th>
            <td>{{ $buku->judul }}</td>
            <td>{{ $buku->penulis }}</td>
            <td>{{ $buku->tgl_terbit }}</td>
            <td>{{ "Rp. ".number_format($buku->harga, 2, ',', '.') }}</td>
            <td><a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-success btn-sm">
                            Edit
                        </a></td>
            <td><form action="{{ route('buku.destroy', $buku->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form></td>
        </tr>
        @empty
         <tr class="text-center">
            <td colspan="5" class="text-center">
                Data Tidak Ditemukan  
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection