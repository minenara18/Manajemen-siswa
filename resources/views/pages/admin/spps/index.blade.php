@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="fw-bold mb-5">SPP</h4>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addModal"
                    class="btn btn-primary d-flex align-items-center gap-2">
                    <i class="bx bx-plus"></i> Added the SPP
                </button>
            </div>
            @if (session('success'))
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <i class="bx bx-check"></i>
                    <div>{{ session('success') }}</div>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Status Pembayaran</th>
                            <th>Nominal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $key => $item)
                            <tr style="vertical-align: middle">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->name_spp }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->nominal }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#editModal {{ $item->id }}"
                                            class="btn btn-sm btn-warning text-white px-3">
                                            Edit
                                        </button>
                                        <form action="{{ route('jurusan.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-sm btn-danger px-3" type="submit"
                                                onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!--edit-->
                            <div class="modal" tabindex="-1" id="editModal{{ $item->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit SPP {{ $item->name_spp }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('SPP.store') }}" method="post">
                                                @csrf
                                                @method('PUT')

                                                <div class="mb-3">
                                                    <label for="name_spp">SPP</label>
                                                    <input type="text" name="name_spp" id="name_spp"
                                                        class="form-control" value="{{ $item->name_spp }} required">
                                                </div>
                                                <label for="status">Status Pembayaran</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="{{ $item->status }}">-Choose the status-</option>
                                                    <option value="months">Months</option>
                                                    <option value="years">Years</option>
                                                </select>
                                                <div class="mb-3">
                                                    <label for="nominal">Nominal</label>
                                                    <input type="text" nominal="nominal" id="nominal"
                                                        class="form-control" value="{{ $item->nominal }}" required>
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
                    <h5 class="modal-title">Tambah Pembayaran SPP baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('SPP.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name_spp">Nama Siswa</label>
                            <input type="text" name="name_spp" id="name_spp" class="form-control" required>
                        </div>
                        <label for="status">Status Pembayaran</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">-Choose the status-</option>
                            <option value="months">Months</option>
                            <option value="years">Years</option>
                        </select>
                        <div class="mb-3">
                            <label for="nominal">Nominal</label>
                            <input type="text" nominal="nominal" id="nominal" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Baru</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
