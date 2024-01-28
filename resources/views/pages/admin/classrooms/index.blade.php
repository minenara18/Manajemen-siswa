@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="fw-bold mb-5">Kelas</h4>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addModal"
                    class="btn btn-primary d-flex align-items-center gap-2">
                    <i class="bx bx-plus"></i> Added the Classroom
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
                            <th>Name of Classroom</th>
                            <th>Major</th>
                            <th>Walikelas</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $key => $item)
                            <tr style="vertical-align: middle">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->classroom_name }}</td>
                                <td>{{ $item->major->major_name }}</td>
                                <td>{{ $item->teacher->teacher_name }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#editModal {{ $item->$id }}"
                                            class="btn btn-sm btn-warning text-white px-3">
                                            Edit
                                        </button>
                                        <form action="{{ route('kelas.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-sm btn-danger px-3" type="submit"
                                                onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!--edit modal-->
                            <div class="modal" tabindex="-1" id="editModal{{ $item->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Classroom {{ $item->classroom_name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('kelas.store') }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="classroom_name">Classroom</label>
                                                    <input type="text" name="classroom_name" id="classroom_name"
                                                        class="form-control" value="{{ $item->classroom_name }} required">
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

    <!--create modal-->
    <div class="modal" tabindex="-1" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">tambah kelas baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kelas.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="classroom_name">Nama kelas</label>
                            <input type="text" name="classroom_name" id="classroom_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="major_id">Jurusan</label>
                            <select name="major_id" id="major_id" class="form-select" required>
                                <option value="">Pilih Jurusan</option>
                                @foreach ($majors as $major)
                                    <option value="{{ $major->id }}"
                                        {{ $major->id == $item->major_id ? 'SELECTED' : '' }}>
                                        {{ $major->major_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="teacher_id">Wali Kelas</label>
                            <select name="teacher_id" id="teacher_id" class="form-select" required>
                                <option value="">Pilih Wali Kelas</option>
                                @foreach ($majors as $major)
                                    <option value="{{ $major->id }}"
                                        {{ $teacher->id == $item->teacher_id ? 'SELECTED' : '' }}>
                                        {{ $teacher->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Baru</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
