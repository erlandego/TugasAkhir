<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1> {{ $users->name }} </h1>
    @if($users->is_admin == true)
        <h2>Admin</h2>
    @else
        <h2>User</h2>
    @endif
    {{ $users->email }} <br>
    <b> Hobby : </b> {{ $users->hobby }} <br>
    <a href="/listalamat/{{ $users->slug }}">Lihat Alamat</a>
</body>
</html>
