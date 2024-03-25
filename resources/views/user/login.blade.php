<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phone Book </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row col-12">
            <h2>Login</h2>
            @include('error')
            @if (@session('loginError'))
                <li class="alert alert-danger">{{ session('loginError') }}</li>
            @endif

            @include('error')
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <input type="text" placeholder="User Name" class="form-control" name="name"><br>
                <input type="password" placeholder="Password" class="form-control" name="password"><br>

                <input type="submit" value="Login" class="btn btn-outline-success" name="submit">
            </form>
        </div>
    </div>

</body>

</html>
