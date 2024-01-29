@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <h4 class="fw-bold mb-5">Added Teacher</h4>

            <div class="card border-0">
                <div class="card-body p-4">
                    <form action="{{ route('guru.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nip">NIP</label>
                                    <input type="text" name="nip" id="nip" class="form-control" required
                                        autofocus>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name of Teacher</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="place_of_birth">Place of Birth</label>
                                    <input type="text" name="place_of_birth" id="place_of_birth" class="form-control"
                                        required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="address" cols="30" rows="3" class="form-control" required></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="photo">Foto</label>
                                    <input type="file" accept="image/*" name="photo" id="photo"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="position">Position</label>
                                    <input type="text" name="position" id="position" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="">--Choose Gender--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="religion">Religion</label>
                                    <select name="religion" id="religion" class="form-control">
                                        <option value="">--Choose Religion--</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Catholic">Catholic</option>
                                        <option value="Christian">Christian</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Confucian">Confucian</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Simpan Baru</button>
                                <a href="{{ route('guru.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
