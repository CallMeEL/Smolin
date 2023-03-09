<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Smolin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ ('assets/beranda.css') }}">
</head>
<body>
    <div class="container-fluid banner2">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-3">
                <img style="width: 100%" src="{{ ('img/motor_header.png') }}" alt="">
            </div>
            <div class="col-md-3"></div>
            <div class="col-sm-4 transparent-background">
{{--Head--}}
                <br>
                <h2 class="text-center"><strong>Glad to see you again!</strong></h2>
                <br>
                <form action="#" method="POST">
                    @csrf
{{--Email--}}
                    <div class="form-floating mb-3 mt-3">
                        <input type="email" class="form-control transparent-input" id="email" placeholder="Enter email" name="email" autofocus required>
                        <label for="email">Email</label>
                    </div>
{{--Password--}}
                    <div class="form-floating mt-3 mb-3">
                        <input type="password" class="form-control transparent-input" id="password" placeholder="Enter password" name="password" required>
                        <label for="password">Password</label>
                    </div>
{{--Show Password--}}
                    <div class="form-floating mt-3 mb-3">
                        <input type="checkbox" class="" onclick="myFunction()"> Show Password
                    </div>
                    <br>
{{--Button--}}
                    <div class="d-grid">
                    <button type="submit" class="btn colorpink button-press-pink text-white btn-block"><strong>Login</strong></button>
                    </div>
                    <br>
                    <p class="text-center">Don't have an account?   <a class="text-white" href="#" id="register"><strong>Register</strong></a></p>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
</script>