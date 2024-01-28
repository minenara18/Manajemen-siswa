@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="fw-bold mb-5">Subject</h4>
                <a href="{{ route('mapel.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
                    <i class="bx bx-plus"></i> Added the Subject
                </a>
            </div>
            @if (session('success'))
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <i class="bx bx-check"></i>
                    <div>{{ session('success') }}</div>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-hover table-striped">

                    <form action="{{ route('mapel.filter') }}" method="GET">
                        <div class="mb-3 btn btn-secondary d-flex align-items-center gap-5">
                            <label for="group_of_subject" class="text-center">Group Of Subject</label>
                            <select name="group_of_subject" id="group_of_subject" class="form-select">
                                <option value="">-choose the group of subject-</option>
                                <option value="Kelompok A" {{ $kelompok == 'Kelompok A' ? 'SELECTED' : '' }}>Kelompok A
                                </option>
                                <option value="Kelompok B" {{ $kelompok == 'Kelompok B' ? 'SELECTED' : '' }}>Kelompok B
                                </option>
                                <option value="Kelompok C" {{ $kelompok == 'Kelompok C' ? 'SELECTED' : '' }}>Kelompok C
                                </option>
                            </select>
                            <button type="submit" class="btn btn-info col-1"><i class="bx bx-filter"></i>
                                Filter</button>
                        </div>
                    </form>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name of Subject</th>
                            <th>Name of Subject Teacher</th>
                            <th>Group of Subject</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $key => $item)
                            <tr style="vertical-align: middle">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->name_subject }}</td>
                                <td>{{ $item->name_subject_teacher }}</td>
                                <td>{{ $item->group_subject }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('mapel.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning text-white px-3">
                                            Edit
                                        </a>
                                        <form action="{{ route('mapel.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-sm btn-danger px-3" type="submit"
                                                onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
