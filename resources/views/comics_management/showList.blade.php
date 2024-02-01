<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel dc comics </title>
    @vite('resources/js/app.js')
</head>

<body>
   <div>
    <div>
        <a href="{{route('comics_management.create')}}">create a comics article</a>
    </div>
    <ul>
        @foreach ($comic as $comics)
            <li>
                {{$comics['title']}}
            </li>
        @endforeach
    </ul>
   </div>
</body>

</html>
