<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login</title>
</head>
<body>
<main>
    <form method="POST" action="{{ route('login') }}">
        @csrf

            <label for="email">E-Mail Address</label>
            <input id="email" type="email" name="email">
        @error('email')
        <span>{{ $message }}</span>
        @enderror

            <label for="password">Password</label>
            <input id="password" type="password" name="password">
        @error('password')
        <span>{{ $message }}</span>
        @enderror

            <button type="submit">Login</button>
    </form>
</body>
</html>