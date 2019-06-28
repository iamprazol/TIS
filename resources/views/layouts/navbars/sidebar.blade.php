<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/atithi.png" class="navbar-brand-img" rel="icon" type="image/png" style="margin-bottom: -1rem;">
            {{--}}<img src="{{ asset('argon') }}/img/brand/tis-logo.png" class="navbar-brand-img" alt="...">--}}
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/brand/user2.png">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/tis-logo.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">

                @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('purpose.index') }}">
                            <i class="ni ni-satisfied"></i>{{ __('Purpose') }}
                        </a>
                    </li>
                    @if(auth()->user()->role_id == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('checkpoint.index') }}">
                                <i class="ni ni-pin-3"></i>{{ __('Checkpoint') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.index') }}">
                                <i class="ni ni-circle-08"></i>{{ __('Users') }}
                            </a>
                        </li>
                    @endif
                @endif
                    <li class="nav-item">
                        <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                            <i class="ni ni-paper-diploma" style="color: #f4645f;"></i>
                            <span class="nav-link-text" style="color: #f4645f;">{{ __('Tourist Information') }}</span>
                        </a>
                        <div class="collapse show" id="navbar-examples">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('information.index') }}">
                                        <i class="ni ni-collection"></i>{{ __('Entry Information') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('exitinfo.index') }}">
                                        <i class="ni ni-single-copy-04"></i>{{ __('Exit Information') }}
                                    </a>
                                </li>
                                @if(auth()->user()->role_id == 1)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('info.validate') }}">
                                            <i class="ni ni-check-bold"></i>{{ __('Check Validation') }}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    @if(auth()->user()->role_id != 3)
                    <li class="nav-item">
                        @if(auth()->user()->unreadNotifications->count() == 0)
                            <a class="nav-link" id="edit" href="{{ route('markasread') }}" data-toggle="tooltip" data-color="primary" data-placement="top" data-content="No edit request found">
                                <i class="ni ni-bell-55"></i>{{ __('Edit Request') }}&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="badge badge-danger">{{ auth()->user()->unreadNotifications->count() }}</span>
                            </a>
                        @else
                            <a class="nav-link" id="edit" href="{{ route('markasread') }}" data-toggle="tooltip" data-color="primary" data-placement="top" data-content="You have {{ auth()->user()->unreadNotifications->count() }} edit request pending">
                                <i class="ni ni-bell-55"></i>{{ __('Edit Request') }}&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="badge badge-danger">{{ auth()->user()->unreadNotifications->count() }}</span>
                            </a>
                        @endif
                    </li>
                    @endif
                    @if(auth()->user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                                <i class="ni ni-shop" style="color: #f4645f;"></i>
                                <span class="nav-link-text" style="color: #f4645f;">{{ __('Home Page') }}</span>
                            </a>
                            <div class="collapse show" id="navbar-examples">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('aboutus') }}">
                                            <i class="ni ni-ruler-pencil"></i>{{ __('About Us') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('contactus') }}">
                                            <i class="ni ni-email-83"></i>{{ __('Contact Us') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('districts.index') }}">
                                            <i class="ni ni-image"></i>{{ __('Districts') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('places.index') }}">
                                            <i class="ni ni-album-2"></i>{{ __('Places') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                            <i class="ni ni-chart-bar-32" style="color: #f4645f;"></i>
                            <span class="nav-link-text" style="color: #f4645f;">{{ __('Statistics') }}</span>
                        </a>

                        <div class="collapse show" id="navbar-examples">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('chart.info') }}">
                                        <i class="ni ni-chart-pie-35"></i>{{ __('Information Chart') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('chart.purpose') }}">
                                        <i class="ni ni-chart-pie-35"></i>{{ __('Purpose Chart') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

            </ul>
        </div>
    </div>
</nav>