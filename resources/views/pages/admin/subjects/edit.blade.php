@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="py-5">
            <div class="container">
                <h4 class="fw-bold md-5">Edit Subject{{ $item->name }}</h4>

                <div class="card border-0">
                    <div class="card-body">

                        <form action="{{ route('mapel.update', $item->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name_subject">Name Subject</label>
                                    <input type="text" name="name_subject" id="name_subject" class="form-control"
                                        value="{{ $item->name_subject }}" autofocus>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="name_subject_teacher">Nama Guru</label>
                                    <input type="text" name_subject_teacher="name_subject_teacher"
                                        id="name_subject_teacher" class="form-control"
                                        value="{{ $item->name_subject_teacher }}" required>
                                </div>


                                <div class="col-6 mb-3">
                                    <label for="group">Group of Subject</label>
                                    <select name="group" id="group" class="form-control">
                                        <option value="Kelompok 1" {{ $item->group == 'Kelompok A' ? 'SELECTED' : '' }}>
                                            Kelompok A (Pelajaran Wajib)</option>
                                        <option value="Kelompok 2" {{ $item->group == 'Kelompok B' ? 'SELECTED' : '' }}>
                                            Kelompok B (Kejuruan)</option>
                                        <option value="Kelompok 3" {{ $item->group == 'Kelompok C' ? 'SELECTED' : '' }}>
                                            Kelompok C (Peminatan)</option>
                                    </select>
                                </div>

                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    <a href="{{ route('mapel.index') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
