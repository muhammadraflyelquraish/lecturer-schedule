@extends('layouts.main')

@section('container')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Data Seluruh Users</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Dosen</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role->name }}</td>


                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#update-role-{{ $user->id }}">
                            Ubah Role
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="update-role-{{ $user->id }}" tabindex="-1"
                            aria-labelledby="update-role-{{ $user->id }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="POST" action="{{ Route('users.update', $user) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="update-role-{{ $user->id }}Label">Ubah Role
                                                User
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Ubah Role</span>
                                                <select class="form-select" name="role_id" id="role_id" required>
                                                    <option selected value="" disabled>Pilih
                                                        Role
                                                    </option>
                                                    @foreach ($roles as $role)
                                                        @if (old('role_id', $user->role->id) == $role->id)
                                                            <option value="{{ $role->id }}" selected>
                                                                {{ $role->name }}</option>
                                                        @else
                                                            <option value="{{ $role->id }}">
                                                                {{ $role->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    </body>

    </html>
@endsection
