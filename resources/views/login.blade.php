<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login System</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <div class="container">
            <div class="col-12">
                <form action="{{route('postlogin')}}" method="post">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @isset($message)
                        {{$message}}
                    @endisset
                    @csrf
                    <div class="title">
                        <h2>Login Website</h2>
                    </div>
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Password">
                    <input type="submit" value="Login">
                    <a href="{{route('getRegister')}}">Register member ?</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>