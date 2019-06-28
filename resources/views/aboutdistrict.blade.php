<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- Google Fonts -->
    <link
            href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap"
            rel="stylesheet"
    />
    <!-- Bootstrap -->
    <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous"
    />

    <!-- CSS Files -->
    <link type="text/css" href="{{ asset('argon') }}/css/main.css?v=1.0.0" rel="stylesheet">

    <link href="{{ asset('argon') }}/img/brand/gandaki.png" rel="icon" type="image/png">
    <title>Atithi Gandaki</title>
</head>
<body>
<!-- Header -->

<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top ">
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="/"
        >        <img src="{{ asset('argon') }}/img/brand/gandaki.png" rel="icon" type="image/png" style="height: 2.5rem; width: 2.5rem;">
            <span class="text-success">Atithi </span>Gandaki</a
        >
        <button
                class="navbar-toggler  "
                type="button"
                data-toggle="collapse"
                data-target=".dual-collapse2"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2 ">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link mr-3" href="/">Home</a>
            </li>

            <li class="nav-item dropdown">
                <a
                        class="nav-link dropdown-toggle mr-5"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                >
                    User
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/register">Sign Up</a>
                    <a class="dropdown-item" href="/login">Login</a>
                </div>
            </li>
        </ul>
    </div>
</nav>


<!-- Carousel -->

<!--Carousel Wrapper-->
<div
        id="carousel-example-2"
        class="carousel slide carousel-fade mb-4"
        data-ride="carousel"
>
    <div class="carousel-inner " role="listbox">
        <div class="carousel-item active">
            <div class="view">
                <img
                        class="d-block w-100"
                        src="{{ asset('argon') }}/img/districts/{{ $district->picture }}"
                        alt="Beautiful Mountain"
                />
                <div class="mask rgba-black-light"></div>
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive ">{{ $district->district_name }}</h3>
            </div>
        </div>
    </div>
</div>

<!-- Footer Links -->

<!-- Copyright -->
<div class="footer-copyright text-center py-3">
    © 2019 Powered By:
    <a href="https://infomax.com.np/"> Infomax</a>
</div>
<!-- Copyright -->
</footer>
<!-- Footer -->

<!-- Bootstrap Scripts -->
<script
        src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"
></script>
<script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"
></script>
<script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"
></script>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/bbd754e695.js"></script>
</body>
</html>