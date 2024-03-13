<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Register</title>
</head>
<body>
    <form method="POST" action="{{ route('register') }}">
        @csrf

            <label for="name">Name</label>
            <input id="name" type="text" name="name">
        @error('name')
        <span>{{ $message }}</span>
        @enderror

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

            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" name="password_confirmation">
        @error('password-confirm')
        <span>{{ $message }}</span>
        @enderror

            <button type="submit">Register</button>
    </form>
</body>
</html>