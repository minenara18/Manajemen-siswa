@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <h1 class="fw-bold mb-5">Selamat Datang, {{ Auth::user()->name }}</h1>
            <div class="row">
                <div class="col-md-3">
                    <div class="card border-light-subtle mb-4">
                        <div class="card-body p-4">
                            <i class="bx bxs-user-badge fs-1 text-primary"></i>
                            <h5 class="text-dark mt-3">{{ number_format($jumlah_siswa) }} siswa</h5>
                            <p class="mb-0 text-secondary">Jumlah seluruh siswa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-light-subtle mb-4">
                        <div class="card-body p-4">
                            <i class="bx bxs-buildings fs-1 text-primary"></i>
                            {{-- <h5 class="text-dark mt-3">{{ number_format($jumlah_kelas) }} Kelas</h5> --}}
                            <p class="mb-0 text-secondary">Jumlah seluruh Kelas</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-light-subtle mb-4">
                        <div class="card-body p-4">
                            <i class="bx bxs-user-pin fs-1 text-primary"></i>
                            {{-- <h5 class="text-dark mt-3">{{ number_format($jumlah_guru) }} Guru</h5> --}}
                            <p class="mb-0 text-secondary">Jumlah seluruh guru pengajar</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-light-subtle mb-4">
                        <div class="card-body p-4">
                            <i class="bx bxs-notepad fs-1 text-primary"></i>
                            {{-- <h5 class="text-dark mt-3">{{ number_format($jumlah_mapel) }} Mapel</h5> --}}
                            <p class="mb-0 text-secondary">Jumlah seluruh Mata pelajaran</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
