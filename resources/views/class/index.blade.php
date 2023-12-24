@extends('layouts.main')

@section('container')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Data Semua Kelas</h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-class">
        Tambah Kelas
    </button>

    <!-- Modal -->
    <div class="modal fade" id="create-class" tabindex="-1" aria-labelledby="create-classLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ Route('classes.store') }}" method="POST">
                @csrf
                @method('POST')

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="create-classLabel">Tambah data kelas
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Nama Kelas</span>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Angkatan</span>
                            <input type="text" class="form-control" name="angkatan" value="{{ old('angkatan') }}">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Angkatan</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $class)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $class->name }}</td>
                    <td>{{ $class->angkatan }}</td>
                    <td>
                        <form action="{{ Route('classes.update', $class->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#class-{{ $class->id }}">
                                Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="class-{{ $class->id }}" tabindex="-1"
                                aria-labelledby="class-{{ $class->id }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="class-{{ $class->id }}Label">Ubah data
                                                kelas
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Nama Kelas</span>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ old('name', $class->name) }}">
                                            </div>

                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Angkatan</span>
                                                <input type="text" class="form-control" name="angkatan"
                                                    value="{{ old('angkatan', $class->angkatan) }}">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form action="{{ Route('classes.destroy', $class) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus?');">
                            @csrf
                            @method('DELETE')

                            <button class='btn btn-danger btn-xs mx-1'>Delete</button>
                        </form>

                    </td>
                    {{-- <td><a href="{{ Route('users.edit', $user) }}">Ubah</a></td> --}}
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
