<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>User In Redis</title>
</head>

<body>
    <h1>Users In Redis</h1>
    @foreach($users as $user)
    <hr />
    {{ $user }}
    @endforeach
</body>

</html>