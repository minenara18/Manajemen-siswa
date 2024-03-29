@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="fw-bold mb-5">Teacher</h4>
                <a href="{{ route('guru.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
                    <i class="bx bx-plus"></i> Added of Teacher
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
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Photo</th>
                            <th>NIP</th>
                            <th>Name of Teacher</th>
                            <th>Position</th>
                            <th>Gender</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $key => $item)
                            <tr style="vertical-align: middle">
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <img src="{{ url('storage/' . $item->photo) }}" widht="30" height="30"
                                        alt="" class="rounded-circle">
                                </td>
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->position }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('guru.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning text-white px-3">
                                            Edit
                                        </a>
                                        <form action="{{ route('guru.destroy', $item->id) }}" method="post">
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
