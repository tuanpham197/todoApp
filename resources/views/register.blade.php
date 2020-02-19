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
            <div class="col-5">
                <img src="images/img-01.png" alt="">
            </div>
            <div class="col-7">
                <form action="{{route('postRegister')}}" method="post">
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
                        <h2>Register Task.com</h2>
                    </div>
                    <input type="text" name="name" placeholder="Username">
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Password">
                    <input type="password" name="repassword" placeholder="Re-Password">
                    <input type="submit" value="Register"><br>
                    <a href="">Login ?</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>