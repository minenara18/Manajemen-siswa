@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="fw-bold mb-5">Parents</h4>
                <a href="{{ route('ortu.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
                    <i class="bx bx-plus"></i> Added the Parents
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
                            <th>Name of Parents</th>
                            <th>Parent</th>
                            <th>Parents Job</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $key => $item)
                            <tr style="vertical-align: middle">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->parent }}</td>
                                <td>{{ $item->parents_job }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('ortu.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning text-white px-3">
                                            Edit
                                        </a>
                                        <form action="{{ route('ortu.destroy', $item->id) }}" method="post">
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
