<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMOLIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <style>
        .banner {
        background: url("{{ ('img/hoome.png') }}")
        no-repeat center center;
        background-size: cover;
        padding-top: 20%;
        padding-bottom: 20%;
        color: #fff;
    }
    div.top{
        position: absolute;
        top: 150px;
    }
    .colorpink{
        color: #fc2585;
    }
    .blur {
        -webkit-backdrop-filter: blur(8px);
        backdrop-filter: blur(8px);
    }
    </style>
</head>
<body>
    <nav class="navbar fixed-top blur navbar-expand-lg shadow-5-strong">
    <div class="container">
        <a class="navbar-brand" href="#">
            <strong class="text-white" >Smolin</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav navbar-right me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link text-white active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white active" aria-current="page" href="#">Profile</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white active" aria-current="page" href="#">Contact</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <!-- Page Background -->
    <div class="container-fluid banner">
        <div class="container-fluid top">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-7">
                    <h1 class="mb-2 display-2 text-white"><strong>Kemudahan berkeliling</strong></h1>
                    <br>
                    <h1 class="mb-2 display-2 text-white"><strong>dengan Smolin!</strong></h1>
                    <br>
                    <br>
                    <a href="#layanan">
                        <button type="button" class="btn btn-info btn-lg text-white">
                        <strong>Sewa Sekarang!</strong>
                        </button>
                    </a>
                </div>
                <div class="col-md-3">
                    <img style="width: 250px" src="{{ ('img/motor_header.png') }}" alt="">
                </div>
            </div>
        </div>  
    </div>
</body>
</html>