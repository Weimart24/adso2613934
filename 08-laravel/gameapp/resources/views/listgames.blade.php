<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Juegos</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <h1>Lista de Juegos</h1>
    <table class="table table-zebra">
        <thead>
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Desarrollador</th>
                <th>Fecha de lanzamiento</th>
                <th>Categoría</th>
                <th>Usuario</th>
                <th>Fecha de Creación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($juegos as $game)
                <tr>
                    <td>{{ $game->id }}</td>
                    <td>{{ $game->title }}</td>
                    <td>{{ $game->developer }}</td>
                    <td>{{ $game->releasedate }}</td>
                    <td>{{ $game->category->name }}</td>
                    <td>{{ $game->user->fullname }}</td>
                    <td>{{ $game->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
