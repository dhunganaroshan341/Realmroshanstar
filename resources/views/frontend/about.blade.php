@extends('frontend.layout.main')
@section('content')
    <style>
        /* TITRE */
        h1 {
            margin-top: 0;
            font-size: 3rem;
            display: inline-block;
        }

        h1 div {
            position: relative;
            float: left;
        }

        h1 div:first-child {
            color: #3498db;
            margin-right: 1rem;
        }

        /* PROFIL */
        .blog .carousel-indicators {
            left: 0;
            top: auto;
            bottom: -40px;

        }

        /* The colour of the indicators */
        .blog .carousel-indicators li {
            background: #a3a3a3;
            border-radius: 50%;
            width: 8px;
            height: 8px;
            margin-bottom: 10px;

        }

        .blog .carousel-indicators .active {
            background: #707070;
            margin-bottom: 10px;
        }

        .our-team-section {
            position: relative;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .our-team-section:before {
            position: absolute;
            top: -0;
            left: 0;
            content: " ";
            background: url(img/service-section-bottom.png);
            background-size: 100% 100px;
            width: 100%;
            height: 100px;
            float: left;
            z-index: 99;
        }

        .our-team {
            padding: 0 0 40px;
            background: #f9f9f9;
            text-align: center;
            overflow: hidden;
            position: relative;
            border-bottom: 5px solid #00325a;
        }

        .our-team:hover {
            border-bottom: 5px solid #2f2f2f;
        }

        .our-team .pic {
            display: inline-block;
            width: 130px;
            height: 130px;
            margin-bottom: 50px;
            z-index: 1;
            position: relative;
        }

        .our-team .pic:before {
            content: "";
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: #00325a;
            position: absolute;
            bottom: 135%;
            right: 0;
            left: 0;
            opacity: 1;
            transform: scale(3);
            transition: all 0.3s linear 0s;
        }

        .our-team:hover .pic:before {
            height: 100%;
            background: #2f2f2f;
        }

        .our-team .pic:after {
            content: "";
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: #ffffff00;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            transition: all 0.3s linear 0s;
        }

        .our-team:hover .pic:after {
            background: #7ab92d;
        }

        .our-team .pic img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            transform: scale(1);
            transition: all 0.9s ease 0s;
            box-shadow: 0 0 0 14px #f7f5ec;
            transform: scale(0.7);
            position: relative;
            z-index: 2;
        }

        .our-team:hover .pic img {
            box-shadow: 0 0 0 14px #f7f5ec;
            transform: scale(0.7);
        }

        .our-team .team-content {
            margin-bottom: 30px;
        }

        .our-team .title {
            font-size: 22px;
            font-weight: 700;
            color: #4e5052;
            letter-spacing: 1px;
            text-transform: capitalize;
            margin-bottom: 5px;
        }

        .our-team .post {
            display: block;
            font-size: 15px;
            color: #4e5052;
            text-transform: capitalize;
        }

        .our-team .social {
            width: 100%;
            padding-top: 10px;
            margin: 0;
            background: #2f2f2f;
            position: absolute;
            bottom: -100px;
            left: 0;
            transition: all 0.5s ease 0s;
        }

        .our-team:hover .social {
            bottom: 0;
        }

        .our-team .social li {
            display: inline-block;
        }

        .our-team .social li a {
            display: block;
            padding-top: 6px;
            font-size: 15px;
            color: #fff;
            transition: all 0.3s ease 0s;
        }

        .our-team .social li a:hover {
            color: #2f2f2f;
            background: #f7f5ec;
        }

        @media only screen and (max-width: 990px) {
            .our-team {
                margin-bottom: 10px;
            }
        }
    </style>
    <section class="hero-small">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url({{ asset('assets/images/banner1.jpg') }}) ;">
                    <div class="hero-small-background-overlay"></div>
                    <div class="container  h-100">
                        <div class="row align-items-center d-flex h-100">
                            <div class="col-md-12">
                                <div class="block">
                                    <span class="text-uppercase text-sm letter-spacing"></span>
                                    <h1 class="mb-3 mt-3 text-center">About Us</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-2  py-5">
        <div class="container py-2">
            <div class="row">
                <div class="col-md-6 align-items-center d-flex">
                    <div class="about-block">
                        <h1 class="title-color mb-3">About Us</h1>
                        <p>{!! $frontend->work_description ?? '' !!}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image-red-background">
                        <img src="{{ asset('storage/' . $frontend->about_image) }}" alt="" class="w-100">
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="section-4 py-5 text-center">
        <div class="hero-background-overlay"></div>
        <div class="container">
            <div class="help-container">
                <h1 class="title">Do you need help?</h1>
                <p class="card-text mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit
                    velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab
                    reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                <a href="#" class="btn btn-primary mt-3">Call Us Now <i class="fa-solid fa-angle-right"></i></a>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row blog">
            <div class="text-center d-flex ">
                <h1 class="animated fadeInLeft mx-auto text-center mt-4 mb-4">Our Teams</h1>
            </div>
            <div class="col-md-12">
                <div id="blogCarousel" class="carousel slide" data-ride="carousel">



                    <!-- Carousel items -->
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <div class="row">
                                @foreach ($users as $user)

                                <div class="col-lg-3 col-md-6 mb-4 col-sm-6">
                                    <div class="our-team">
                                        <div class="pic">
                                            @if ($user->image)
                                            <img src="{{ asset('storage/'. $user->image) }}">
                                            @else
                                            <img src="{{ asset('defaultImage/defaultimage.webp') }}">
                                            @endif
                                        </div>
                                        <div class="team-content">
                                            <h3 class="title">{{ $user->full_name }}</h3>
                                            <span class="post">{{ $user->position }}</span>
                                        </div>
                                        <ul class="social">
                                            <li>
                                                <a href="{{ $user->email_link }}" class="fa fa-envelope"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <!--.row-->
                        </div>
                        <!--.item-->
                    </div>
                    <!--.carousel-inner-->
                </div>
                <!--.Carousel-->

            </div>
        </div>
    </div>
@endsection
