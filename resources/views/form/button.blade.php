<!DOCTYPE html>
<html>

<head>
    <title>Redirect Button</title>
</head>

<body>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <li>
        <ul><a href="{{ route('users.create') }}" class="btn">REGISTER</a></ul>
        <ul><a href="{{ route('login') }}" class="btn">LOGIN</a></ul>
        <ul><a href="{{ route('lost-founds.create') }}" class="btn">LOST FOUND FORM</a></ul>
    </li>

</body>

</html>