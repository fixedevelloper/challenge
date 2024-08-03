@extends('base')
@section('keywords')

@endsection
@section('description')

@endsection
@section('content')
    <!-- BANNER SECTION START HERE -->
    <section class="banner-main-section w-100 float-left">
        <div class="container-fluid">
            <div class="banner-inner-con">
                <div class="banner-left-con">
                    <span class="d-block" data-aos="fade-up" data-aos-duration="700"></span>
                    <h1 data-aos="fade-up" data-aos-duration="700">Votre Vote Peut Faire la Différence!</h1>
                    <p data-aos="fade-up" data-aos-duration="700">Votez maintenant et montrez votre soutien.

                        Faites entendre votre voix et aidez-nous à couronner la Miss de demain <br>
                        Cliquez sur la rubrique et choisissez celle qui vous inspire le plus.<br>
                        Faites entendre votre voix et aidez-nous à couronner votre choix de demain.</p>
                    <div class="banner-btn" data-aos="fade-up" data-aos-duration="700">
                        <a href="#">Participez au Choix du Public</a>
                    </div>
                </div>
                <div class="banner-right-con" data-aos="fade-up" data-aos-duration="700">
                    <figure class="mb-0">
                        <img width="697" src="{{ asset('front/images/logo.png') }}" alt="candidate-img">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!-- BANNER SECTION END HERE -->
    <!-- MISSION SECTION START HERE -->
    <section class="mission-section w-100 float-left padding-top padding-bottom">
        <div class="container">
            <div class="generic-title text-center">
                <span class="small-txt d-block" data-aos="fade-up" data-aos-duration="700">RUBRIQUES</span>
                <h2 data-aos="fade-up" data-aos-duration="700">CHOISIR VOTRE CANDIDAT, <br> PREFERE</h2>
            </div>
            <div class="mission-inner-con">
                @foreach($rubriques as $rubrique)
                <div class="mission-con text-center" data-aos="fade-up" data-aos-duration="700">
                    <figure>
                        <img src="" alt="">
                    </figure>
                    <h4>{{ $rubrique->name }}</h4>
                    <p>{{ \App\Helper\Helper::makeDescriptionRubrique($rubrique->name) }}</p>
                    <div class="generic-btn">
                        <a class="btn-dark" href="{{ route('candidatrubrique',['id'=>$rubrique->id]) }}"><i class="far fa-arrow-alt-circle-right"></i> CHOISIR</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="" data-aos="fade-up" data-aos-duration="700">

                 <img src="{{ asset('front/images/silder.jpeg') }}">
                </div>
        </div>
    </section>
    <!-- MISSION SECTION END HERE -->

@endsection
