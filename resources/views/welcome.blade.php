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
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li
                data-target="#carousel-example-2"
                data-slide-to="0"
                class="active"
        ></li>
        <li data-target="#carousel-example-2" data-slide-to="1"></li>
        <li data-target="#carousel-example-2" data-slide-to="2"></li>
        <li data-target="#carousel-example-2" data-slide-to="3"></li>
        <li data-target="#carousel-example-2" data-slide-to="4"></li>
        <li data-target="#carousel-example-2" data-slide-to="5"></li>
        <li data-target="#carousel-example-2" data-slide-to="6"></li>
        <li data-target="#carousel-example-2" data-slide-to="7"></li>
        <li data-target="#carousel-example-2" data-slide-to="8"></li>
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

        <div class="carousel-item">
            <!--Mask color-->
            <div class="view">
                <img
                        class="d-block w-100"
                        src="{{ asset('argon') }}/img/userView/rune-haugseng-727710-unsplash.jpg"
                        alt="Rafting"
                />
                <div class="mask rgba-black-strong"></div>
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive text-dark">Rafting</h3>
                <p class="text-dark">Spread the Water</p>
            </div>
        </div>

        <div class="carousel-item">
            <!--Mask color-->
            <div class="view">
                <img
                        class="d-block w-100"
                        src="{{ asset('argon') }}/img/userView/madhushree-narayan-706571-unsplash.jpg"
                        alt="Phewa Lake"
                />
                <div class="mask rgba-black-strong"></div>
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive">Phewa Lake</h3>
                <p>Beautiful Lake in Pokhara</p>
            </div>
        </div>

        <div class="carousel-item">
            <!--Mask color-->
            <div class="view">
                <img
                        class="d-block w-100"
                        src="{{ asset('argon') }}/img/userView/mamun-srizon-1222956-unsplash.jpg"
                        alt="Paragliding"
                />
                <div class="mask rgba-black-strong"></div>
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive text-dark">Paragliding</h3>
                <p class="text-dark">Flying in the Mountains</p>
            </div>
        </div>

        <div class="carousel-item">
            <!--Mask color-->
            <div class="view">
                <img
                        class="d-block w-100"
                        src="{{ asset('argon') }}/img/userView/mamun-srizon-1413734-unsplash.jpg"
                        alt="Gandaki Hills"
                />
                <div class="mask rgba-black-strong"></div>
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive">Gandaki Hills</h3>
                <p>Covered in Fog Kingdom</p>
            </div>
        </div>

        <div class="carousel-item">
            <!--Mask color-->
            <div class="view">
                <img
                        class="d-block w-100"
                        src="{{ asset('argon') }}/img/userView/samrat-khadka-1125626-unsplash.jpg"
                        alt="Mustang"
                />
                <div class="mask rgba-black-strong"></div>
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive text-dark">Mustang</h3>
                <p class="text-dark">Desert Runes</p>
            </div>
        </div>

        <div class="carousel-item">
            <!--Mask color-->
            <div class="view">
                <img
                        class="d-block w-100"
                        src="{{ asset('argon') }}/img/userView/sagar-rana-311637-unsplash.jpg"
                        alt="Birds in the Sky"
                />
                <div class="mask rgba-black-strong"></div>
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive ">Sky Road</h3>
                <p>Peace in the Sky</p>
            </div>
        </div>

        <div class="carousel-item">
            <!--Mask color-->
            <div class="view">
                <img
                        class="d-block w-100"
                        src="{{ asset('argon') }}/img/userView/trek-4054510_960_720.jpg"
                        alt="Longest Hanging Bridge"
                />
                <div class="mask rgba-black-strong"></div>
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive text-dark">Kushma</h3>
                <p class="text-dark">Longest Hanging Bridge</p>
            </div>
        </div>
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
    <div class="card border border-primary m-2">
        <img
                class="card-img-top"
                src="{{ asset('argon') }}/img/userView/simon-english-672450-unsplash.jpg"
                alt="Card image cap"
                style="height: 30vh;"
        />
        <div class="card-body">
            <h5 class="card-title">Manang</h5>
            <p class="card-text">
                Natural heritages are Tilicho Lake, Annapurna and Gangapurna while Cultural/Religious heritages are Gompa at Manang and Braga.
            </p>
        </div>
    </div>

    <div class="card border border-primary m-2">
        <img
                class="card-img-top"
                src="{{ asset('argon') }}/img/userView/gorkha-durbar1.jpg"
                alt="Card image cap"
                style="height: 30vh;"
        />
        <div class="card-body">
            <h5 class="card-title">Gorkha</h5>
            <p class="card-text">
                Natural heritages of Gorkha are Chepe, Daraudi, Marsyangdi and Budhi Gandaki. Dhurkot's Bichitra Cave ehile the cultural heritatges are Manakamana Temple, Gorakh Nath Gorakh Kali and Horse Race
            </p>
        </div>
    </div>

    <div class="card border border-primary m-2">
        <img
                class="card-img-top"
                src="{{ asset('argon') }}/img/userView/panchakot.jpg"
                alt="Card image cap"
                style="height: 30vh;"
        />
        <div class="card-body">
            <h5 class="card-title">Baglung</h5>
            <p class="card-text">
                Bhakunde and Panchakot are sites for views of the Dhaulagiri and Annapurna ranges.Terraced fields, waterfalls, forests, deep gorges and caves are abundant throughout the area.
            </p>
        </div>
    </div>

    <div class="card border border-primary m-2">
        <img
                class="card-img-top"
                src="{{ asset('argon') }}/img/userView/maxresdefault.jpg"
                alt="Card image cap"
                style="height: 30vh;"
        />
        <div class="card-body">
            <h5 class="card-title">Mustang</h5>
            <p class="card-text">
                Most renowned places are Jomsom, Marpha-The town of Apple Orchards, Chhertosum, Chhairo, Muktinath Temple Sanctuary.
            </p>
        </div>
    </div>

    <div class="card border border-primary m-2">
        <img
                class="card-img-top"
                src="{{ asset('argon') }}/img/userView/ghandruk-ghorepani-poon-hill-trek-in-kathmandu-558377.jpg"
                alt="Card image cap"
                style="height: 30vh;"
        />
        <div class="card-body">
            <h5 class="card-title">Myagdi</h5>
            <p class="card-text">
                The world famous Poon Hill lies in the Ghara VDC of this district. Ghorepani is another attraction for travelers.
            </p>
        </div>
    </div>

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

    <div class="card border border-primary m-2">
        <img
                class="card-img-top"
                src="{{ asset('argon') }}/img/userView/DSC_6336-2.jpg"
                alt="Card image cap"
                style="height: 30vh;"
        />
        <div class="card-body">
            <h5 class="card-title">Syangja</h5>
            <p class="card-text">
                Natural heritages of syangja are Adhi Khola, Rakta Taal, Annapurna and Gangapurna while the cultural heritages are Changchangdi Holy Place
            </p>
        </div>
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

    <div class="card border border-primary m-2">
        <img
                class="card-img-top"
                src="{{ asset('argon') }}/img/userView/mamun-srizon-1316442-unsplash.jpg"
                alt="Card image cap"
                style="height: 30vh;"
        />
        <div class="card-body">
            <h5 class="card-title">Kaski</h5>
            <p class="card-text">
                The district is full of rivers such as Seti Gandaki, Modi and Madi along with other rivulets. The district is famous for the Himalayan range with about 11 Himalayas with height greater than 7000 m.
            </p>
        </div>
    </div>

    <div class="card border border-primary m-2">
        <img
                class="card-img-top"
                src="{{ asset('argon') }}/img/userView/Ghale-Gaun-Home-Stay-31-990x490.jpg"
                alt="Card image cap"
                style="height: 30vh;"
        />
        <div class="card-body">
            <h5 class="card-title">Lamjung</h5>
            <p class="card-text">
                Natural heritages of Lamjung are Trekking route Thorang La Pass while renown places are Ghale Gaun, Pas Gaun, Bhujung
            </p>
        </div>
    </div>

    <div class="card border border-primary m-2">
        <img
                class="card-img-top"
                src="{{ asset('argon') }}/img/userView/samrat-khadka-1125715-unsplash.jpg"
                alt="Card image cap"
                style="height: 30vh;"
        />
        <div class="card-body">
            <h5 class="card-title">Tanahun</h5>
            <p class="card-text">
                Famous religious places are Akala Mai, Dhorbarahi, Devghat Tirtha isatal and there are many more.Siddha Gufa/Cage, (Biggest Cage of South Asia) Bimalnagar, Dumre, Bandipur Rural Municipality are highly popular for tourism.
            </p>
        </div>
    </div>

    <div class="card border border-primary m-2">
        <img
                class="card-img-top"
                src="{{ asset('argon') }}/img/userView/shaswat-pic-1-1.jpg"
                alt="Card image cap"
                style="height: 30vh;"
        />
        <div class="card-body">
            <h5 class="card-title">Nawalpur</h5>
            <p class="card-text">
                Shashwat Dham and Maula Kalika Temple is one of the most popular tourist spot of Nawalpur. Tourism is being highly enhanced in this place.
            </p>
        </div>
    </div>

    <div class="card border border-primary m-2">
        <img
                class="card-img-top"
                src="{{ asset('argon') }}/img/userView/parbat.jpg"
                alt="Card image cap"
                style="height: 30vh;"
        />
        <div class="card-body">
            <h5 class="card-title">Parbat</h5>
            <p class="card-text">
                Mainly famous for the Gupteshwar Cave, which is visited by thousands of pilgrims during Shivaratri.Alapeshwar cave is a famous cave in this district.
            </p>
        </div>
    </div>
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