@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <h4 class="fw-bold md-5">Added the Student</h4>

            <div class="card border-0">
                <div class="card-body">

                    <form action="{{ route('siswa.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nisn">NISN</label>
                                <input type="text" name="nisn" id="nisn" class="form-control" required autofocus>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="name">Name of Student</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="date_of_birth">Date of Birth</label>
                                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="place_of_birth">Place of Birth</label>
                                <input type="text" name="place_of_birth" id="place_of_birth" class="form-control">
                            </div>

                            <div class="col-12 mb-3">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" cols="30" rows="3" class="form-control" required></textarea>
                            </div>

                            <div class="col-6 mb-3">
                                <label for="photo">Picture</label>
                                <input type="file" accept="storage/*" name="photo" id="photo" class="form-control"
                                    required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ambition">Ambition</label>
                                <input type="text" name="ambition" id="Ambition" class="form-control" required>
                            </div>

                            <div class="col-6 mb-3">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">-Choose the Gender-</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <div class="col-6 mb-3">
                                <label for="religion">Religion</label>
                                <select name="religion" id="religion" class="form-control">
                                    <option value="">-Choose the Religion-</option>
                                    <option value="islim">Islim</option>
                                    <option value="catholic">Catholic</option>
                                    <option value="christian">Christian</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="buddha">Buddha</option>
                                    <option value="confucian">Confucian</option>
                                </select>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>
@endsection
