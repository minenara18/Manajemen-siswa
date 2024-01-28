@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="py-5">
            <div class="container">
                <h4 class="fw-bold md-5">{{ $item->name }}</h4>

                <div class="card border-0">
                    <div class="card-body">

                        <form action="{{ route('guru.update', ['guru' => $item->id]) }} " method="post">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nip">NIP</label>
                                    <input type="text" name="nip" id="nip" class="form-control"
                                        value="{{ $item->nip }}" autofocus>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="name">Nama Guru</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $item->name }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="date_of_birth">Tanggal Lahir</label>
                                    <input type="text" name="date_of_birth" id="date_of_birth"
                                        value="{{ $item->date_of_birth }}" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="place_of_birth">Tempat Lahir</label>
                                    <input type="text" name="place_of_birth" id="place_of_birth"
                                        value="{{ $item->place_of_birth }}" class="form-control">
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="address">Alamat Guru</label>
                                    <textarea name="address" id="address" cols="30" rows="3"
                                        class="form-control" required>value="{{ $item->address }}"</textarea>
                                                                    </div>

                                                                    <div class="col-6 mb-3">
                                                                        <label for="photo">Foto Guru</label>
                                                                        <input type="file" accept="image/*" name="photo" id="photo"
                                                                            class="form-control" required>
                                                                    </div>

                                                                    <div class="col-6 mb-3">
                                                                        <label for="position">Position</label>
                                                                        <input type="text" name="position" id="position" class="form-control" value="{{ $item->position }}"required>
                                                                    </div>

                                                                    <div class="col-6 mb-3">
                                                                        <label for="gender">Gender</label>
                                                                        <select name="gender" id="gender" class="form-control">
                                                                            <option value="{{ $item->gender == 'Male' ? 'SELECTED' : '' }}">Male</option>
                                                                            <option value="{{ $item->gender == 'Female' ? 'SELECTED' : '' }}">Female</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-6 mb-3">
                                                                        <label for="religion">Religion</label>
                                                                        <select name="religion" id="religion" class="form-control">
                                                                            <option value="{{ $item->religion == 'Muslim' ? 'SELECTED' : '' }}">Islam</option>
                                                                            <option value="{{ $item->religion == 'Catholic' ? 'SELECTED' : '' }}">Catholic</option>
                                                                            <option value="{{ $item->religion == 'Christian' ? 'SELECTED' : '' }}">Christian</option>
                                                                            <option value="{{ $item->religion == 'Hindu' ? 'SELECTED' : '' }}">Hndu</option>
                                                                            <option value="{{ $item->religion == 'Buddha' ? 'SELECTED' : '' }}">Buddha</option>
                                                                            <option value="{{ $item->religion == 'Confucian' ? 'SELECTED' : '' }}">Confucian</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="d-flex gap-2">
                                                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                                        <a href="{{ route('guru.index') }}" class="btn btn-secondary">Batal</a>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>

                                                </div>
                                            </section>
                                        </div>
@endsection
