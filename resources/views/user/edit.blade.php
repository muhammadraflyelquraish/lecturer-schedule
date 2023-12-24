<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit user</title>
</head>

<body>

    <h3>{{ $user->name }}</h3>

    <label for="role">Choose new role:</label>

    <br><br>

    <form method="POST" action="{{ Route('users.update', $user) }}">
        @csrf
        @method('PUT')

        <select name="role_id" id="role_id" required>
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

        <br><br>

        <button type="submit">Ubah Role</button>
    </form>

   



</body>

</html>
