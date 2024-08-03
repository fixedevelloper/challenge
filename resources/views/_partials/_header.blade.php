
<!-- Header area end here -->
<!-- HEADER SECTION START HERE -->
<div class="@yield('header2-main-con') header-main-con w-100 float-left">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{ route('home') }}">
                <figure class="mb-0">
                    <img src="{{ asset('front/images/logo.png') }}" width="120" alt="header-logo" loading="lazy">
                </figure>
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link p-0" href="{{ route('home') }}">ACCUEIL</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle p-0 " href="#" id="navbarDropdown4" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            RUBRIQUES
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown4">
                            <ul class="list-unstyled mb-0">
                                @php
                                    $rubriques=\App\Models\Rubrique::all()
                                @endphp
                                @foreach($rubriques as $rubrique)
                                    <li>
                                        <a class="dropdown-item" href="{!! route('candidatrubrique',['id'=>$rubrique->id]) !!}">{{ $rubrique->name }}</a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-0" href="#">NOS PARTENAIRES</a>
                    </li>
                </ul>
            </div>
            <div class="nav-btns d-flex align-items-center">
                <ul class="list-unstyled mb-0 d-flex">
                    <li><a href="https://www.facebook.com/login/"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://twitter.com/i/flow/login"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></li>
                </ul>
                <div class="donate-btn">
                    <a href="#">
                        <i class="fas fa-hand-holding-usd"></i> Devenir partenaire
                    </a>
                </div>
                <div class="header-contact-btn">
                    <a href="tel:+18002345"><i class="fas fa-phone-alt"></i> +237696023586</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- HEADER SECTION END HERE -->
