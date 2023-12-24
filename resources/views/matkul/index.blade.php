<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Matkul</title>
</head>

<body>

    <h1>Nampilih semua matkul</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col">Semester</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matkuls as $matkul)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $matkul->code }}</td>
                    <td>{{ $matkul->name }}</td>
                    <td>{{ $matkul->semester }}</td>
                    {{-- <td><a href="{{ Route('users.edit', $user) }}">Ubah</a></td> --}}
                </tr>
            @endforeach

        </tbody>
    </table>

</body>

</html>
