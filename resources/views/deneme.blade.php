<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@foreach($data as $rs)
<h2>{{ $rs->mail }}</h2>
<a href="{{route('get_diyetisyen', ['id' => $rs->id])}}"> Show</a>

@endforeach

</body>
</html>
