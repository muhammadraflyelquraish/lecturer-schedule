@extends('layouts.main')

@section('container')
    <h1>Data Seluruh Schedule</h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-schedule">
        Tambah Schedule
    </button>

    <!-- Modal -->
    <div class="modal fade" id="create-schedule" tabindex="-1" aria-labelledby="create-scheduleLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ Route('schedule.store') }}" method="POST">
                @csrf
                @method('POST')

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="create-scheduleLabel">Tambah data Schedule
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Pilih Dosen</span>
                            <select name="user_id" id="user_id" required>
                                @foreach ($users as $user)
                                    @if ($user->role->name == 'Dosen')
                                        <option value={{ old('user_id', $user->id) }}>
                                            @isset($user->nip)
                                                {{ $user->nip }} - {{ $user->name }}
                                            @else
                                                No-NIP - {{ $user->name }}
                                            @endisset
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Tahun Akademik</span>
                            <input type="text" class="form-control" name="tahun_akademik"
                                value="{{ old('tahun_akademik') }}">
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
                <th scope="col">User ID</th>
                <th scope="col">Nama User</th>
                <th scope="col">Tahun Akademik</th>
                <th scope="col">Detail Schedule</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $schedule->user_id }}</td>
                    <td>{{ $schedule->user->name }}</td>
                    <td>{{ $schedule->tahun_akademik }}</td>
                    <td><a class="btn btn-primary" href="{{ Route('schedule.show', $schedule->id) }}">Detail</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
