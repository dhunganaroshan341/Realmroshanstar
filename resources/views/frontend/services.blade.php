@extends('frontend.layout.main')
@section('content')
<section class="hero-small">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url({{ asset('assets/images/banner1.jpg') }}) ;">
                <div class="hero-background-overlay"></div>
                <div class="container  h-100">
                    <div class="row align-items-center d-flex h-100">
                        <div class="col-md-12">
                            <div class="block text-center">
                                <span class="text-uppercase text-sm letter-spacing"></span>
                                <h1 class="mb-3 mt-3 text-center">Services</h1>
                                <p>We are a passionate digital design agency that specializes in beautiful and easy-to-
                                    use digital design & web development services.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-3 py-5">
    <div class="container">
        <div class="divider mb-3"></div>
        <h2 class="title-color mb-4 h1">Services</h2>
        <div class="cards">
           <div class="row">
            @foreach ($services as $service)


                <div class="col-md-4 mb-4">
                    <div class="card border-0">
                        <img src="{{ asset('storage/' . $service->image ) }}" class="card-img-top" alt="">
                        <div class="card-body p-3">
                            <h1 class="card-title mt-2"><a href="{{ route('service-detail', $service->id) }}">{{ $service->name }}</a></h1>
                            <div class="content pt-2">
                                <p class="card-text">{{ $service->short_desc }}</p>
                            </div>
                            <a href="{{ route('service-detail', $service->id) }}" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                @endforeach
                {{-- <div class="col-md-4 mb-4">
                    <div class="card border-0">
                        <img src="{{ asset('assets/images/digital-marketing.jpg') }}" class="card-img-top" alt="">
                        <div class="card-body p-3">
                            <h1 class="card-title mt-2"><a href="#">Digital Marketing</a></h1>
                            <div class="content pt-2">
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                            </div>
                            <a href="#" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card border-0">
                        <img src="{{ asset('assets/images/t-shirt-design.jpg') }}" class="card-img-top" alt="">
                        <div class="card-body p-3">
                            <h1 class="card-title mt-2"><a href="#">T-shirt Design</a></h1>
                            <div class="content pt-2">
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                            </div>
                            <a href="#" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card border-0">
                        <img src="{{ asset('assets/images/book-cover-design.jpg') }}" class="card-img-top" alt="">
                        <div class="card-body p-3">
                            <h1 class="card-title mt-2"><a href="#">Book Cover Design</a></h1>
                            <div class="content pt-2">
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                            </div>
                            <a href="#" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card border-0">
                        <img src="{{ asset('assets/images/book-cover-design.jpg') }}" class="card-img-top" alt="">
                        <div class="card-body p-3">
                            <h1 class="card-title mt-2"><a href="#">Brochure Design</a></h1>
                            <div class="content pt-2">
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                            </div>
                            <a href="#" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card border-0">
                        <img src="{{ asset('assets/images/book-cover-design.jpg') }}" class="card-img-top" alt="">
                        <div class="card-body p-3">
                            <h1 class="card-title mt-2"><a href="#">App Design</a></h1>
                            <div class="content pt-2">
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                            </div>
                            <a href="#" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div> --}}

           </div>
        </div>
    </div>
</section>
@endsection