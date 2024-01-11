@extends('layout.template')

@section('title', $sepatu ? $sepatu->nama : 'Detail Sepatu')

@section('content')
    @if ($sepatu)
        <div class="card" style="margin-top: 40px; margin-bottom: 226.9px">
            <div class="row g-0">
                <div class="col-md-9">
                    <div class="card-body">
                        <h2 class="card-title mb-4" style="font-weight: bold;">{{ $sepatu->nama }}</h2>
                        <p class="card-text" style="font-weight: 600">{{ $sepatu->deskripsi }}</p>
                        <table style="font-weight: 600">
                            <tr>
                                <td class="card-text">Kategori</td>
                                <td class="card-text"> : </td>
                                <td class="card-text">{{ $sepatu->category ? $sepatu->category->nama_kategori : 'Tidak ada kategori' }}</td>
                            </tr>
                            <tr>
                                <td class="card-text">Harga</td>
                                <td class="card-text"> : </td>
                                <td class="card-text">{{ $sepatu->harga }}</td>
                            </tr>
                            <tr>
                                <td class="card-text">Brand</td>
                                <td class="card-text"> : </td>
                                <td class="card-text">{{ $sepatu->brand }}</td>
                            </tr>
                        </table>
                        <a href="/" class="btn btn-primary mt-5">Kembali</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <img src="/images/{{ $sepatu->foto_sampul }}" class="img-fluid rounded-end" alt="...">
                </div>
            </div>
        </div>
    @else
        <p>Data sepatu tidak ditemukan.</p>
    @endif
@endsection
