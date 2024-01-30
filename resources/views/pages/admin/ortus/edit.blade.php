@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="py-5">
            <div class="container">
                <h4 class="fw-bold md-5">{{ $item->name }}</h4>

                <div class="card border-0">
                    <div class="card-body">

                        <form action="{{ route('guru.update', ['siswa' => $item->id]) }}" method="post">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="student_id" value="{{ $students->id }}">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Name of Parents</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $item->name }}" required>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="parent">Parent</label>
                                    <select name="parent" id="parent" class="form-control">
                                        <option value="{{ $item->parent == 'father' ? 'SELECTED' : '' }}">Father</option>
                                        <option value="{{ $item->parent == 'mother' ? 'SELECTED' : '' }}">Mother</option>
                                        <option value="{{ $item->parent == 'wali' ? 'SELECTED' : '' }}">Wali</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="parents_job">Pekerjaan</label>
                                        <input type="text" name="parents_job" id="parents_job" class="form-control"
                                            value="{{ $item->parents_job }}" required autofocus>
                                    </div>
                                </div>

                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    <a href="{{ route('orang-tua.index', $students->id) }}"
                                        class="btn btn-secondary">Batal</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
