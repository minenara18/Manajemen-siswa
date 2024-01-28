@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="py-5">
            <div class="container">
                <h4 class="fw-bold md-5">{{ $item->name }}</h4>

                <div class="card border-0">
                    <div class="card-body">

                        <form action="{{ route('mapel.update', ['mapel' => $item->id]) }}" method="post">
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
                                    <label for="group_subject">Group Subject</label>
                                    <input type="text" name="group_subject" id="group_subject" class="form-control"
                                        value="{{ $item->group_subject }}"required>
                                </div>

                                {{-- <div class="col-6 mb-3">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="{{ $item->gender == 'Male' ? 'SELECTED' : '' }}">Male</option>
                                        <option value="{{ $item->gender == 'Female' ? 'SELECTED' : '' }}">Female</option>
                                    </select>
                                </div> --}}

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
