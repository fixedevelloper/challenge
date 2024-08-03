@extends('base')
@section('header2-main-con')
    header2-main-con
@endsection
@section('description')

@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('front/css/custom-style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/special-classes.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
    @endpush
@section('content')
    <!-- BANNER SECTION START HERE -->
    <section class="sub-banner-section w-100 float-left">
        <div class="container-fluid">
            <div class="sub-banner-inner-con">
                <div class="sub-banner-left-con">
                    <h1 data-aos="fade-up" data-aos-duration="700">{{ $candidat->name }}</h1>
                    <p>Prenez un moment pour voter et aider à couronner les talents les plus méritants.</p>
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-duration="700">
                        <ol class="breadcrumb d-inline-block">
                            <li class="breadcrumb-item d-inline-block"><a href="{{route('home')}}">HOME</a></li>
                            <li class="breadcrumb-item active text-white d-inline-block" aria-current="page">Vote</li>
                        </ol>
                    </nav>
                </div>
                <div class="sub-banner-right-con" >
                    <div class="banner2-right-top-txt">
                        <span class="d-inline-block">“ Le concours est en pleine effervescence,  <br> et chaque vote est crucial pour soutenir vos favoris”</span>

                    </div>
                    <figure class="mb-0">
                        <img src="{{ asset('front/images/logo.png') }}" alt="sub-banner-right-man-img">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!-- BANNER SECTION END HERE -->
    <!-- FORM SECTION START HERE -->
    <section class="unity-form-section index2-form-section donation-form-section w-100 float-left padding-top padding-bottom light-bg">
        <div class="container">
            <div class="index2-form-outer-con">
                <div class="generic-title text-center">
                    <span class="small-txt d-block" data-aos="fade-up" data-aos-duration="700">CONTRIBUTE TO VICTORY</span>
                    <h2 data-aos="fade-up" data-aos-duration="700">JE VOTE <span class="d-inline-block mb-0">POUR</span> {{ $candidat->name }}</h2>
                </div>
                <div class="form-con index2-form-inner-section">
                    <div class="index2-form-img-con donation-form-img" data-aos="fade-up" data-aos-duration="700">
                        <figure class="mb-0">
                            <img width="367" src="{{ asset('storage/'.$candidat->photo) }}" alt="donation-form-img">
                        </figure>
                    </div>
                    <form class="form-box" method="post" id="contactpage">
                        @csrf
                        <div class="form-inputs-con">
                            <ul class="list-unstyled w-100 float-left mb-0">
                                <li data-aos="fade-up" data-aos-duration="700">
                                    <h4>{{ $candidat->name }}</h4>
                                    <p>Age:</p>
                                </li>
                                <li data-aos="fade-up" data-aos-duration="700">
                                    <h4>{{ $votes }} votes</h4>
                                    <p>1Vote = 100FCFA</p>
                                </li>
                                <li data-aos="fade-up" data-aos-duration="700">
                                    <label>Amount:</label>
                                    <input type="number" placeholder="500 FCFA" name="amount" id="tel">
                                </li>
                            </ul>
                        </div>
                        <div class="submit-btn" data-aos="fade-up" data-aos-duration="700">
                            <button type="submit" id="submit">JE PAIE MAINTENANT <i class="far fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- FORM SECTION END HERE -->
@endsection
