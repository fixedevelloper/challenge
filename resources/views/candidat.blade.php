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
                    <h1 data-aos="fade-up" data-aos-duration="700">{{ $rubrique->name }}</h1>
                    <p data-aos="fade-up" data-aos-duration="700">Choisir votre candidat dans cette rubrique</p>
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-duration="700">
                        <ol class="breadcrumb d-inline-block">
                            <li class="breadcrumb-item d-inline-block"><a href="{{route('home')}}">HOME</a></li>
                            <li class="breadcrumb-item active text-white d-inline-block" aria-current="page">RUBRIQUE</li>
                        </ol>
                    </nav>
                </div>
                <div class="sub-banner-right-con" >
                    <div class="banner2-right-top-txt">
                        <span class="d-inline-block">“Stands For A Better, <br> United Tomorrow.”</span>
                    </div>
                    <figure class="mb-0">
                        <img src="{{ asset('front/images/logo.png') }}" alt="sub-banner-right-man-img">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!-- BANNER SECTION END HERE -->
    <section class="blog-posts blogpage-section w-100 float-left">
        <div class="container">
            <div class="row wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div id="blog" class="col-xl-12">
                    <!-- threecolumn-blog  -->
                    <div class="row">
                        @foreach($candidats as $candidat)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-aos="fade-up" data-aos-duration="700">
                                <div class="blog-box blog-box1">
                                    <figure class="blog-image mb-0">
                                        <img src="{{ asset('storage/'.$candidat->candidat->photo) }}" alt="" class="img-fluid" loading="lazy">
                                    </figure>
                                    <div class="lower-portion">
                                        <i class="fa-solid fa-user"></i>
                                        <span class="text-size-14 text-mr">N° {{ $candidat->candidat->numero }}</span>
                                        <i class="tag-mb fa-solid fa-tag"></i>
                                        <h4>{{ $candidat->candidat->name }}</h4>
                                        @php

                                        @endphp
                                        <h4>{{ App\Helper\Helper::voteCandidatRubrique($candidat->candidat->id,$rubrique->id) }} votes</h4>
                                    </div>
                                    <div class="button-portion ">
                                        <div class="button btn-block">
                                            <a class="mb-0 read_more text-decoration-none btn-block" href="{{ route('voting',['id'=>$candidat->candidat->id,'maille'=>$rubrique->id]) }}">Je vote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
