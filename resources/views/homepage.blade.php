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
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $sepatu['nama'] }}</h5>
                                <p class="card-text" style="font-weight: 600">Rp {{ $sepatu['harga'] }},00</p>
                                <a href="/sepatu/{{ $sepatu['id'] }}" class="btn btn-primary mt-4">Lihat Detail</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="/images/{{ $sepatu['foto_sampul'] }}" class="img-fluid rounded-end" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $sepatus->links() }}
        </div>
    </div>
@endsection
