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
                    <div class="col-auto ms-auto d-print-none">
                        <div class="d-flex">
                            <div class="me-3">
                                <button class="btn btn-outline-primary fw-bold" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">Filter
                                </button>
                                <ul class="dropdown-menu p-3">
                                    <form action="" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <li>
                                            <input type="text" value="" class="form-control mb-2"
                                                placeholder="Cari judul buku">
                                        </li>
                                        <li>
                                            <select name="" id="" class="form-control mb-2">
                                                <option value="">Cari genre</option>
                                                @foreach ($genre as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </li>
                                        <li>
                                            <button type="submit"
                                                class="btn btn-outline-primary form-control fw-bold">Cari</button>
                                        </li>
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    @foreach ($data as $item)
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card card-borderless shadow-sm card-sm">
                                <a href="#" class="d-block">
                                    <img src="{{ asset('uploads/aplikasi/' . $logo->logo) }}" class="card-img-top"
                                        style="border-top-left-radius: 12px; border-top-right-radius: 12px;">
                                </a>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="fw-bold">{{ $item->title }}</div>
                                            <div class="text-secondary">{{ $item->author_name }}</div>
                                            <div class="text-secondary">{{ $item->publish_year }}</div>
                                            <div class="text-secondary">{{ $item->genre_name }}i</div>
                                            <div class="text-secondary">{{ $item->publisher }}</div>
                                            <div class="text-secondary">
                                                Kuota - <span class="fw-bold">{{ $item->quantity }}</span>
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            <div>
                                                <a href="{{ $item->id }}" class="btn btn-outline-warning">
                                                    Pinjam
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
@endsection
