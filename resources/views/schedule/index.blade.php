<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Schedule</title>
</head>

<body>

    <h1>Nampilih semua Schedule</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">User ID</th>
                <th scope="col">Tahun Akademik</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $schedule->user_id }}</td>
                    <td>{{ $schedule->tahun_akademik }}</td>
                    <td><a href="{{ Route('schedule.show', $schedule->id) }}">Detail</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>

</body>

</html>
