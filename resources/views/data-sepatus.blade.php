@extends('layout.template')

@section('title', 'Data Sepatu')

@section('content')

    <h1 class="pt-3 pb-4" style="text-align: center; font-weight: bold;">Data Katalog Sepatu</h1>
    <a href="/sepatus/create" class="btn btn-success mb-4">Input Sepatu</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Kategori</th>
                <th scope="col">Harga</th>
                <th scope="col">Brand</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sepatus as $sepatu)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $sepatu->nama }}</td>
                    <td>{{ $sepatu->category->nama_kategori }}</td>
                    <td>{{ $sepatu->harga }}</td>
                    <td>{{ $sepatu->brand }}</td>
                    <td class="text-nowrap">
                        <a href="/sepatu/{{ $sepatu['id'] }}/edit" class="btn btn-warning">Edit</a>
                        <a href="/sepatu/delete/{{ $sepatu->id }}" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $sepatus->links() }}
    </div>
    <a href="/" class="btn btn-primary mb-3">Kembali</a>
@endsection
