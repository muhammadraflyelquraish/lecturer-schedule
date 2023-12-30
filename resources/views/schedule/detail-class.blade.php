@extends('layouts.main')

@section('container')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Detail Matkul Kelas</h1>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-schedule">
        Tambah Schedule Class
    </button>

    <!-- Modal -->
    <div class="modal fade" id="create-schedule" tabindex="-1" aria-labelledby="create-scheduleLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ Route('shedule.matkul.class.store', [$schedule->id, $scheduleMatkul->id]) }}" method="POST">
                @csrf
                @method('POST')

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="create-scheduleLabel">Tambah data Schedule Class
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Pilih Cass</span>
                            <select name="class_id" class="form-control" id="class_id" required>
                                @foreach ($class as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }} ({{ $row->angkatan }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Jumlah SKS</span>
                            <input type="integer" class="form-control" name="sks" value="{{ old('sks') }}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Hari</span>
                            <select name="hari" class="form-control" id="hari">
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Dari / Sampai (Jam)</span>
                            </div>
                            <input type="time" class="form-control" name="start_time" value="{{ old('start_time') }}">
                            <input type="time" class="form-control" name="end_time" value="{{ old('end_time') }}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Ruangan</span>
                            <input type="text" class="form-control" name="ruangan" value="{{ old('ruangan') }}">
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
        <tr>
            <td>Dosen</td>
            <td>:</td>
            <td>{{ $schedule->user->name }}</td>
            <td>Matkul</td>
            <td>:</td>
            <td>({{ $scheduleMatkul->matkul->code }}) {{ $scheduleMatkul->matkul->name }}</td>
        </tr>
        <tr>
            <td>Tahun Akademik</td>
            <td>:</td>
            <td>{{ $schedule->tahun_akademik }}</td>
            <td>Semester</td>
            <td>:</td>
            <td>{{ $scheduleMatkul->matkul->semester }}</td>
        </tr>
    </table>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kelas</th>
                <th scope="col">Sks</th>
                <th scope="col">Hari/ Waktu/ Ruang</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($scheduleMatkul->classes as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->class->name }} ({{ $row->class->angkatan }})</td>
                    <td>{{ $row->sks }}</td>
                    <td>{{ $row->hari }} / {{ $row->jam }} / {{ $row->ruangan }}</td>
                    <td class="d-flex gap-2">
                        <form action="" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class='btn btn-danger btn-xs mx-1'>Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach()
        </tbody>
    </table>
@endsection
