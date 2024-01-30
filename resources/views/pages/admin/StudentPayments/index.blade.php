@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-5">
                <h4 class="fw-bold">Kelas</h4>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addModal"
                    class="btn btn-primary d-flex align-items-center gap-2">
                    <i class="bx bx-plus"></i> Tambah Kelas
                </button>
            </div>

            @if (session('success'))
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <i class="bx bx-check"></i> Berhasil ditambahkan
                    <div>{{ session('SUCCESS') }}</div>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nama SPP</th>
                            <th>Tanggal Bayar</th>
                            <th>Bulan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $key => $item)
                            <tr style="vertical-align: middle">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->student->student_name }}</td>
                                <td>{{ $item->payment->payment_name }}</td>
                                <td>{{ $item->date_of_pay }}</td>
                                <td>{{ $item->month }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $item->id }}"
                                            class="btn btn-sm btn-warning text-white px-4">
                                            Edit
                                        </button>
                                        <form action="{{ route('kelas.destroy', $item->id) }}" method="post">
                                            @csrf

                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger px-4" type="submit"
                                                onclick="return confirm('Kamu yakin ingin menghapusnya?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal" tabindex="-1" id="editModal{{ $item->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit SPP Siswa {{ $item->student_id }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('spp_murid.update', $item->id) }}" method="post">
                                                @csrf
                                                @method('PUT')

                                                <div class="mb-3">
                                                    <label for="student_id">Nama Siswa</label>
                                                    <input type="text" name="student_id" id="student_id"
                                                        class="form-control" value="{{ $item->student_id }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="payment_id">Jurusan</label>
                                                    <select name="payment_id" id="payment_id" class="form-select" required>
                                                        <option value="">Pilih Jurusan</option>
                                                        @foreach ($payments as $payment)
                                                            <option value="{{ $payment->id }}"
                                                                {{ $payment->id == $item->payment_id ? 'SELECTED' : '' }}>
                                                                {{ $payment->payment_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="teacher_id">Wali Kelas</label>
                                                    <select name="teacher_id" id="teacher_id" class="form-select" required>
                                                        <option value="">Pilih Wali Kelas</option>
                                                        @foreach ($teachers as $teacher)
                                                            <option value="{{ $teacher->id }}"
                                                                {{ $teacher->id == $item->teacher_id ? 'SELECTED' : '' }}>
                                                                {{ $teacher->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <div class="modal" tabindex="-1" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('spp_murid.store') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="student_id">Siswa</label>
                            <select name="student_id" id="student_id" class="form-select" required>
                                <option value="">Pilih Siswa</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->student_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="payment_id">Nama SPP</label>
                            <select name="payment_id" id="payment_id" class="form-select" required>
                                <option value="">Pilih SPP</option>
                                @foreach ($payments as $payment)
                                    <option value="{{ $payment->id }}">{{ $payment->name_payment }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date_of_pay">Tanggal bayar</label>
                                <input type="date" name="date_of_pay" id="date_of_pay" class="form-control" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Baru</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
