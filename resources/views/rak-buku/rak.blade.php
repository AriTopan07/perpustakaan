@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Rak Buku
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    @foreach ($rak as $item)
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card card-borderless shadow-sm card-sm">
                                <a href="#" class="d-block">
                                    <img src="{{ asset('uploads/aplikasi/' . $logo->logo) }}" class="card-img-top"
                                        style="border-top-left-radius: 12px; border-top-right-radius: 12px;">
                                </a>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="fw-bold">{{ $item->genre_name }}</div>
                                        </div>
                                        <div class="ms-auto">
                                            <div>
                                                <a href="{{ $item->id }}" class="btn btn-outline-warning">
                                                    Lihat Buku
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $rak->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
@endsection
