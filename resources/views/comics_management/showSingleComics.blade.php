<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>comics</title>
</head>
<body>
    <div>
        {{$comics->title}}
        <a href="{{ route('comics_management.index') }}">Torna alla lista dei fumetti</a>
    </div>
</body>
</html>