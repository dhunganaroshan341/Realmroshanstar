@extends('frontend.layout.main')
@section('content')
    <section class="hero">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                @foreach ($homeslides as $index => $slide)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}"
                        style="background-image: url({{ asset('storage/' . $slide->image) }}) ;">
                        <div class="hero-background-overlay"></div>
                        <div class="container h-100">
                            <div class="row align-items-center d-flex h-100">
                                <div class="col-md-7">
                                    <div class="block">
                                        <div class="divider mb-3"></div>
                                        <h1 class="mb-3 mt-3">{{ $slide->title }}</h1>
                                        <p class="mb-4 pr-5">{!! $slide->shortdesc !!}</p>
                                        <div class="btn-container ">
                                            <a href="#" target="_blank" class="btn btn-primary">Contact
                                                Now <i class="icofont-simple-right ml-2  "></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="section-2  py-5">
        <div class="container py-2">
            <div class="row">
                <div class="col-md-6 align-items-center d-flex">
                    <div class="about-block">
                        <h1 class="title-color">Welcome</h1>
                        <p>{!! $frontend->description !!}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image-red-background">
                        <img src="{{ asset('storage/'. $frontend->welcome_image) }}" alt="" class="w-100">
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
                <p class="card-text mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum,
                    odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque?
                    Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                <a href="#" class="btn btn-primary mt-3">Call Us Now <i class="fa-solid fa-angle-right"></i></a>
            </div>
        </div>
    </section>

    <section class="section-3 py-5">
        @include('frontend.testimonial')
    </section>
@endsection
