@extends('frontend.master')
@section('title','Home')
@section('content')

<section class="hero">
<div class="hero__slider owl-carousel">
    <div class="hero__items set-bg" data-setbg="{{ asset('assetss/img/hero/hero-1.jpg') }}">
        <div class="hero__text">
            <h2>Quality is not only our standard.</h2>
            <a href="#" class="primary-btn">See Project</a>
            <a href="#" class="more_btn">Discover more</a>
            <div class="hero__social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
    </div>
    <div class="hero__items set-bg" data-setbg="{{ asset('assetss/img/hero/hero-1.jpg') }}">
        <div class="hero__text">
            <h2>Quality is not only our standard.</h2>
            <a href="#" class="primary-btn">See Project</a>
            <a href="#" class="more_btn">Discover more</a>
            <div class="hero__social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="slide-num" id="snh-1"></div>
<div class="slider__progress"><span></span></div>
</section>

<section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about__text">
                        <div class="section-title">
                            <span>who are we</span>
                            <h2>We propose and discuss design rules</h2>
                        </div>
                        <div class="about__para__text">
                            <p>Metasurfaces are generally designed by placing scatterers in periodic or pseudo-periodic
                                grids. We propose and discuss design rules for functional metasurfaces with randomly
                            placed.</p>
                            <p>Anisotropic elements that randomly sample. Quisque sit amet nisl ante. Fusce lacinia non
                            tellus id gravida. Cras neque dolor, volutpat et hendrerit et.</p>
                        </div>
                        <a href="#" class="primary-btn normal-btn">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__pic">
                        <div class="about__pic__inner">
                            <img src="{{ asset('assetss/img/about-pic.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection