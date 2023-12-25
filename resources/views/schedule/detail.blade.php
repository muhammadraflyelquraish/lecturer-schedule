@extends('layouts.main')

@section('container')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Detail Schedule</h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#matkulModal">
        Tambah Mata Kuliah
    </button>

    <!-- Modal -->
    <div class="modal fade" id="matkulModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">List Matkul</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('shedule.matkul.store', $schedule->id) }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Nama Matkul</th>
                                    <th scope="col">Semester</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($matkuls as $matkul)
                                    <tr>
                                        @php $isExist = false @endphp
                                        @foreach ($schedule->matkuls as $scheduleMatkul)
                                            @if ($matkul->id == $scheduleMatkul->matkul->id)
                                                @php $isExist = true @endphp
                                            @endif
                                        @endforeach

                                        @if ($isExist)
                                            <td><input type="checkbox" name="matkul_ids[]" value="{{ $matkul->id }}"
                                                    checked="" disabled>
                                            @else
                                            <td><input type="checkbox" name="matkul_ids[]" value="{{ $matkul->id }}">
                                        @endif
                                        </td>
                                        <td>{{ $matkul->code }}</td>
                                        <td>{{ $matkul->name }}</td>
                                        <td>{{ $matkul->semester }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <table class="table">
        <tr>
            <td>Nama Dosen</td>
            <td>:</td>
            <td>{{ $schedule->user->name }}</td>
        </tr>
        <tr>
            <td>Tahun Akademik</td>
            <td>:</td>
            <td>{{ $schedule->tahun_akademik }}</td>
        </tr>
    </table>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode</th>
                <th scope="col">Nama Matkul</th>
                <th scope="col">Semester</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedule->matkuls as $matkul)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $matkul->matkul->code }}</td>
                    <td>{{ $matkul->matkul->name }}</td>
                    <td>{{ $matkul->matkul->semester }}</td>
                    <td>
                        <form action="{{ Route('shedule.matkul.destroy', [$schedule->id, $matkul->id]) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus?');">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class='btn btn-danger btn-xs mx-1'>Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
