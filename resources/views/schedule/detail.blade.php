<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Schedule</title>
</head>

<body>

    <h1>Nampilih Detail Schedule</h1>

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
                <th scope="col">Nama Matkul</th>
                <th scope="col">Semester</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedule->matkuls as $matkul)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $matkul->matkul->code }}</td>
                    <td>{{ $matkul->matkul->name }}</td>
                    <td>{{ $matkul->matkul->semester }}</td>
                    <td><a href="{{ Route('shedule.matkul.destroy', [$matkul->id, $schedule->id]) }}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
