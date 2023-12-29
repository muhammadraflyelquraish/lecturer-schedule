@extends('layouts.main')

@section('container')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Data Seluruh Courses</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Dosen</th>
                <th scope="col">Tahun Ajaran</th>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">SKS</th>
                <th scope="col">Hari</th>
                <th scope="col">Jam</th>
                <th scope="col">Ruangan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ScheduleMatkulClasses as $ScheduleMatkulClass)
                <tr>
                    <td>
                        {{ $ScheduleMatkulClass-> }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    </body>

    </html>
@endsection
