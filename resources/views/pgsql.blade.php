<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>User In PGSQL</title>
</head>

<body>
    <h1>Users In PGSQL</h1>
    @foreach($users as $user)
    <hr />
    {{ $user->name }} <br />
    id: {{ $user->id }} <br />
    email: {{ $user->email }} <br />
    details: {{ $user->remember_token }} <br />
    @endforeach
</body>

</html>