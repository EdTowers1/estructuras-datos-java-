<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays en Laravel</title>
</head>

<body>
    <h1>Arrays de apellidos en Laravel</h1>
    <ul>
        @foreach ($apellidos as $apellido)
            <li>{{ $apellido }}</li>
        @endforeach
    </ul>
</body>

</html>
