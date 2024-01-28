@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <h4 class="fw-bold md-5">Added the Student</h4>

            <div class="card border-0">
                <div class="card-body">

                    <form action="{{ route('ortu.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Name of Parents</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="col-6 mb-3">
                                <label for="parent">parent</label>
                                <select name="parent" id="parent" class="form-control">
                                    <option value="">-Choose the parent-</option>
                                    <option value="father">Father</option>
                                    <option value="mother">Mother</option>
                                    <option value="Wali">Wali</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="parents_job">Parents Job</label>
                                <input type="text" name="parents_job" id="parents_job" class="form-control" required>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('ortu.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>
@endsection
