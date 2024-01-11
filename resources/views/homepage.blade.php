@extends('layout.template')

@section('title', 'Homepage')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1 style="text-align: center; font-weight: bold; padding: 20px 0px 20px 0px;">Katalog Sepatu</h1>

    <div class="row mx-5">
        @foreach ($sepatus as $sepatu)
            <div class="col-lg-6">
                <a href="/sepatu/{{ $sepatu['id'] }}" style="text-decoration: none">
                    <div class="box card mb-4 " style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="kol1 col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $sepatu['nama'] }}</h5>
                                    <p class="card-text" style="font-weight: 600">Rp {{ $sepatu['harga'] }},00</p>
                                    <p style="font-style: italic; margin-top: 28px;">Tekan untuk lihat selengkapnya...</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="/images/{{ $sepatu['foto_sampul'] }}" class="gambar img-fluid rounded-end"
                                    alt="...">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $sepatus->links() }}
        </div>
    </div>
@endsection
