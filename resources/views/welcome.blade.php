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
        >        <img src="{{ asset('argon') }}/img/brand/atithi.png"  class="navbar-brand-img" rel="icon" type="image/png" style="height: 6vh;">
        </a>
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
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li
                data-target="#carousel-example-2"
                data-slide-to="0"
                class="active"
        ></li>
        @for($count = 1; $count <= $carousels->count(); $count++ )
            <li data-target="#carousel-example-2" data-slide-to="{{ $count }}"></li>
        @endfor
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner " role="listbox">
        <div class="carousel-item active">
            <div class="view">
                <img
                        class="d-block w-100"
                        src="{{ asset('argon') }}/img/userView/laurentiu-morariu-1419974-unsplash.jpg"
                        alt="Beautiful Mountain"
                />
                <div class="mask rgba-black-light"></div>
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive ">Beautiful Mountain</h3>
                <p class="">A glimpse of Nature</p>
            </div>
        </div>

        @foreach($carousels as $carousel)
            <div class="carousel-item">
                <!--Mask color-->
                <div class="view">
                    <img
                            class="d-block w-100"
                            src="{{ asset('argon') }}/img/carousel/{{ $carousel->picture }}"
                            alt="{{ $carousel->title }}"
                    />
                    <div class="mask rgba-black-strong"></div>
                </div>
                <div class="carousel-caption">
                    <h3 class="h3-responsive text-dark">{{ $carousel->title }}</h3>
                    <p class="text-dark">{{ $carousel->tag }}</p>
                </div>
            </div>
        @endforeach

    </div>

    <!--/.Slides-->
    <!--Controls-->
    <a
            class="carousel-control-prev"
            href="#carousel-example-2"
            role="button"
            data-slide="prev"
    >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a
            class="carousel-control-next"
            href="#carousel-example-2"
            role="button"
            data-slide="next"
    >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->

<!-- Destination -->
<div class="mb-4 ">
    <h2 class="text-center">
        <span class="text-success">VISIT</span> GANDAKI
    </h2>
</div>

<!-- Cards -->
<div class="card-columns container">
    @foreach($districts as $district)
        <div class="card border border-primary m-2">
            <img
                    class="card-img-top"
                    src="{{ asset('argon') }}/img/districts/{{ $district->picture }}"
                    alt="Card image cap"
                    style="height: 30vh;"
            />
            <div class="card-body">
                <h5 class="card-title">{{ $district->district_name }}</h5>
                <p class="card-text">
                    {{ substr(strip_tags($district->description), 0, 130) }}
                </p>
                <a href="{{ route('home.district', ['id' => $district->id]) }}" class="card-link">See More</a>
            </div>
        </div>
    @endforeach

{{--
    <div class="card bg-primary text-white text-center p-3">
        <blockquote class="blockquote mb-0">
            <p>
                One’s destination is never a place, but a new way of seeing things.
            </p>

            <small>
                <cite title="Source Title">- Henry Miller</cite>
            </small>
        </blockquote>
    </div>

    <div class="card bg-primary text-white text-center p-3">
        <blockquote class="blockquote mb-0">
            <p>
                Do not follow where the path may lead. Go instead where there is no path and leave a trail.
            </p>

            <small>
                <cite title="Source Title">- Ralph Waldo Emerson</cite>
            </small>
        </blockquote>
    </div>
    --}}
</div>

<div class="border border-info m-3 pt-3">
    <h2 class="text-center text-success">
        <span class="text-muted">About</span> Us
    </h2>
    <p class="pl-4 pr-4 text-justify">
      {{ $about->description }}
    </p>
</div>

<!-- Footer -->
<footer class="page-footer font-small unique-color-dark">
    <div style="background-color: #6351ce;">
        <div class="container">
            <!-- Grid row-->
            <div class="row py-4 d-flex align-items-center">
                <!-- Grid column -->
                <div
                        class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0"
                >
                    <h6 class="mb-0">Get connected with us on social networks!</h6>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-6 col-lg-7 text-center text-md-right">
                    <!-- Facebook -->
                    <a class="fb-ic">
                        <i class="fab fa-facebook-f white-text mr-4"> </i>
                    </a>
                    <!-- Twitter -->
                    <a class="tw-ic">
                        <i class="fab fa-twitter white-text mr-4"> </i>
                    </a>
                    <!-- Google +-->
                    <a class="gplus-ic">
                        <i class="fab fa-google-plus-g white-text mr-4"> </i>
                    </a>
                    <!--Linkedin -->
                    <a class="li-ic">
                        <i class="fab fa-linkedin-in white-text mr-4"> </i>
                    </a>
                    <!--Instagram-->
                    <a class="ins-ic">
                        <i class="fab fa-instagram white-text"> </i>
                    </a>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row-->
        </div>
    </div>

    <!-- Footer Links -->
    <div class=" text-center text-md-left mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                <hr
                        class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto"
                        style="width: 60px;"
                />
                <p>
                    <a href="http://www.moitfe.gandaki.gov.np/en/">
                        Gandaki Tourism Board</a
                    >
                </p>
                <p>
                    <a href="https://www.welcomenepal.com/">Nepal Tourism Board</a>
                </p>
                <p>
                    <a href="http://www.pokharamun.gov.np/">Pokhara Metropolitan</a>
                </p>
                <p>
                    <a
                            href="https://cid.nepalpolice.gov.np/index.php/cid-wings/tourist-police"
                    >Tourist Police Pokhara</a
                    >
                </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Contact</h6>
                <hr
                        class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto"
                        style="width: 60px;"
                />

                <p><i class="fas fa-home mr-3"></i> {{ $contact->address }}</p>
                <p><i class="fas fa-envelope mr-3"></i> {{ $contact->email }}</p>
                <p><i class="fas fa-phone mr-3"></i> {{ $contact->phone }}</p>
                <p><i class="fas fa-print mr-3"></i> {{ $contact->fax }}</p>
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row -->
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