@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <h4 class="fw-bold mb-5">Edit Kelas {{ $item->name }}</h4>

            <div class="card border-0">
                <div class="card-body p-4">
                    <form action="{{ route('siswa.update', $item->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nisn">NISN</label>
                                    <input type="text" name="nisn" id="nisn" class="form-control"
                                        value="{{ $item->nisn }}" required autofocus>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Nama Siswa</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $item->name }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date_of_birth">Tanggal Lahir</label>
                                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control"
                                        value="{{ $item->date_of_birth }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="place_of_birth">Tempat Lahir</label>
                                    <input type="text" name="place_of_birth" id="place_of_birth" class="form-control"
                                        value="{{ $item->place_of_birth }}" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="address">Alamat Siswa</label>
                                    <textarea name="address" id="address" cols="30" rows="3" class="form-control" required>{{ $item->address }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="Laki-Laki" {{ $item->gender == 'Male' ? 'SELECTED' : '' }}>
                                            Male</option>
                                        <option value="Perempuan" {{ $item->gender == 'Female' ? 'SELECTED' : '' }}>
                                            Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label for="religion">Religion</label>
                                <select name="religion" id="religion" class="form-control">
                                    <option value="{{ $item->religion == 'Islim' ? 'SELECTED' : '' }}">Islam</option>
                                    <option value="{{ $item->religion == 'Catholic' ? 'SELECTED' : '' }}">Catholic</option>
                                    <option value="{{ $item->religion == 'Christian' ? 'SELECTED' : '' }}">Christian
                                    </option>
                                    <option value="{{ $item->religion == 'Hindu' ? 'SELECTED' : '' }}">Hndu</option>
                                    <option value="{{ $item->religion == 'Buddha' ? 'SELECTED' : '' }}">Buddha</option>
                                    <option value="{{ $item->religion == 'Confucian' ? 'SELECTED' : '' }}">Confucian
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="photo">Foto</label>
                                    <input type="file" accept="image/*" name="photo" id="photo"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="classroom_id">Kelas</label>
                                    <select name="classroom_id" id="classroom_id" class="form-select" required>
                                        <option value="">Pilih Kelas</option>
                                        @foreach ($classrooms as $classroom)
                                            <option value="{{ $classroom->id }}"
                                                {{ $classroom->id == $item->classroom_id ? 'SELECTED' : '' }}>
                                                {{ $classroom->classroom_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
