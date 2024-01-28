@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <h4 class="fw-bold md-5">Added the Subject</h4>

            <div class="card border-0">
                <div class="card-body">

                    <form action="{{ route('mapel.store', ['mapel' => $item->id]) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name_subject">Name Subject</label>
                                <input type="text" name="name_subject" id="name_subject" class="form-control" required
                                    autofocus>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="name_subject_teacher">Name Subject Teacher</label>
                                <input type="text" name="name_subject_teacher" id="name_subject_teacher"
                                    class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="group_subject">Group of Subject</label>
                                <input type="text" name="group_subject" id="group_subject" class="form-control" required>
                            </div>

                            {{-- <div class="col-6 mb-3">
                                <label for="group_subject">Group of Subject</label>
                                <select name="group_subject" id="group_subject" class="form-control">
                                    <option value="">-Choose the Gender-</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div> --}}

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('mapel.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>
@endsection
