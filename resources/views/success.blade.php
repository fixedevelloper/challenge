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

    <!-- FORM SECTION START HERE -->
    <section class="unity-form-section index2-form-section donation-form-section w-100 float-left padding-top padding-bottom light-bg">
        <div class="container">
            <div class="index2-form-outer-con">
                <div class="generic-title text-center">
                    <span class="small-txt d-block text-success" data-aos="fade-up" data-aos-duration="700">SUCCESS</span>
                    <h2 data-aos="fade-up" data-aos-duration="700">VOTRE REQUETE A ETE DEROULE AVEC SUCCESS</h2>
                </div>

            </div>
        </div>
    </section>
    <!-- FORM SECTION END HERE -->
@endsection
