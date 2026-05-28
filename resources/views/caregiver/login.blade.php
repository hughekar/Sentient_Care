<!DOCTYPE html>
<html>
<head>
    <title>Caregiver Login</title>
</head>
<body>
    <h2>Caregiver Login</h2>

    @if ($errors->any())
        <div style="color:red;">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('caregiver.login.submit') }}">
        @csrf

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
