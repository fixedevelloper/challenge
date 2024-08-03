<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ env('APP_NAME') }}</title>
    <!-- Favicon icon -->
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="{{ asset('front/images/logo.png') }}"
    />
    <!-- Custom Stylesheet -->

    <link rel="stylesheet" href="{{ asset('assets/backend/css/style.css') }}" />
</head>

<body>
<div id="preloader"><i>.</i><i>.</i><i>.</i></div>

<div id="main-wrapper">
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="header-content">
                        <div class="header-left">
                            <div class="brand-logo">
                                <a href="{{ route('dashboard') }}">
                                    <img src="{{asset(' front/images/logo.png')}}" alt="" width="120" />
                                    <span>{{ env('APP_NAME') }}</span>
                                </a>
                            </div>
                        </div>

                        <div class="header-right">
                            <div class="dark-light-toggle" onclick="themeToggle()">
                                <span class="dark"><i class="icofont-moon"></i></span>
                                <span class="light"><i class="icofont-sun-alt"></i></span>
                            </div>

                            <div class="profile_log dropdown">
                                <div class="user" data-toggle="dropdown">
                      <span class="thumb"
                      ><img src="{{ asset('u') }}" alt=""
                          /></span>
                                    <span class="arrow"
                                    ><i class="icofont-angle-down"></i
                                        ></span>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="user-email">
                                        <div class="user">
                          <span class="thumb"
                          ><img src="./images/profile/2.png" alt=""
                              /></span>
                                            <div class="user-info">
                                                <h5>Jannatul Maowa</h5>
                                                <span>Qash.inc@gmail.com</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="user-balance">
                                        <div class="available">
                                            <p>Available</p>
                                            <span>0.00 BTC</span>
                                        </div>
                                        <div class="total">
                                            <p>Total</p>
                                            <span>0.00 USD</span>
                                        </div>
                                    </div>
                                    <a href="profile.html" class="dropdown-item">
                                        <i class="icofont-ui-user"></i>Profile
                                    </a>
                                    <a href="wallet.html" class="dropdown-item">
                                        <i class="icofont-wallet"></i>Wallet
                                    </a>
                                    <a href="settings-profile.html" class="dropdown-item">
                                        <i class="icofont-ui-settings"></i> Setting
                                    </a>
                                    <a href="settings-activity.html" class="dropdown-item">
                                        <i class="icofont-history"></i> Activity
                                    </a>
                                    <a href="lock.html" class="dropdown-item">
                                        <i class="icofont-lock"></i>Lock
                                    </a>
                                    <a href="signin.html" class="dropdown-item logout">
                                        <i class="icofont-logout"></i> Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar">
        <div class="brand-logo">
            <a href="{{ route('dashboard') }}"><img src="./images/logo.png" alt="" /> </a>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a
                        href="{{ route('dashboard') }}"
                        data-toggle="tooltip"
                        data-placement="right"
                        title="Dashboard"
                    >
                        <span><i class="icofont-ui-home"></i></span>
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('edition') }}"
                        data-toggle="tooltip"
                        data-placement="right"
                        title="Editions"
                    >
                        <span><i class="icofont-blood"></i></span>
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('candidat') }}"
                        data-toggle="tooltip"
                        data-placement="right"
                        title="Candidats"
                    >
                        <span><i class="icofont-users"></i></span>
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('rubrique') }}"
                        data-toggle="tooltip"
                        data-placement="right"
                        title="Rubriques"
                    >
                        <span><i class="icofont-box"></i></span>
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('vote') }}"
                        data-toggle="tooltip"
                        data-placement="right"
                        title="Votes"
                    >
                        <span><i class="icofont-price"></i></span>
                    </a>
                </li>
                <li class="logout">
                    <a
                        href="signin.html"
                        data-toggle="tooltip"
                        data-placement="right"
                        title="Signout"
                    >
                        <span><i class="icofont-power"></i></span>
                    </a>
                </li>
            </ul>

            <p class="copyright">&#169; <a href="#">OGNI</a></p>
        </div>
    </div>

    <div class="content-body">
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/backend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{!! asset('assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

<script src="{!! asset('assets/backend/js/scripts.js') !!}"></script>
<script></script>
</body>
</html>
