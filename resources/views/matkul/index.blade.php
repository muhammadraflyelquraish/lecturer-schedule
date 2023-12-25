@extends('layouts.main')

@section('container')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Data Semua Mata Kuliah</h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-class">
        Tambah Mata Kuliah
    </button>

    <!-- Modal -->
    <div class="modal fade" id="create-class" tabindex="-1" aria-labelledby="create-classLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ Route('matkul.store') }}" method="POST">
                @csrf
                @method('POST')

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="create-classLabel">Tambah data mata kuliah
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Nama</span>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Kode</span>
                            <input type="text" class="form-control" name="code" value="{{ old('code') }}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Semester</span>
                            <input type="text" class="form-control" name="semester" value="{{ old('semester') }}">
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
                <th scope="col">Nama</th>
                <th scope="col">Kode</th>
                <th scope="col">Semester</th>
                <th scope="col">Delete</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matkuls as $matkul)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $matkul->name }}</td>
                    <td>{{ $matkul->code }}</td>
                    <td>{{ $matkul->semester }}</td>
                    <td>
                        <form action="{{ Route('matkul.update', $matkul->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#class-{{ $matkul->id }}">
                                Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="class-{{ $matkul->id }}" tabindex="-1"
                                aria-labelledby="class-{{ $matkul->id }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="class-{{ $matkul->id }}Label">Ubah data
                                                Matkul
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Nama</span>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ old('name', $matkul->name) }}">
                                            </div>

                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Kode</span>
                                                <input type="text" class="form-control" name="code"
                                                    value="{{ old('code', $matkul->code) }}">
                                            </div>

                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Semester</span>
                                                <input type="text" class="form-control" name="semester"
                                                    value="{{ old('code', $matkul->semester) }}">
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
                        <form action="{{ Route('matkul.destroy', $matkul) }}" method="POST"
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
