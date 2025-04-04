<style>
    .testimonial-card {
        background: linear-gradient(145deg, #e96565, #a1838300);
        border-radius: 20px;
        box-shadow: 8px 8px 16px #d1d9e6, -8px -8px 16px #ffffff;
        transition: transform 0.3s ease;
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
    }

    .quote-icon {
        font-size: 4rem;
        color: #6366f1;
        opacity: 0.2;
    }

    .avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 40px;
        height: 40px;
        background-color: #6366f1;
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
    }

    .carousel-control-prev {
        left: -20px;
    }

    .carousel-control-next {
        right: -20px;
    }

    .carousel-indicators {
        bottom: -50px;
    }

    .carousel-indicators button {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: #6366f1;
        opacity: 0.5;
    }

    .carousel-indicators .active {
        opacity: 1;
    }
</style>
<div class="bg-light">
    <div class="container-fluid py-5">
        <h2 class="text-center mb-5">What Our Customers Say</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        @foreach ($testimonials as $index=>$testimonial)
                            <div class="carousel-item {{ $index ==1 ? 'active':'' }}">
                                <div class="testimonial-card p-4 p-md-5">
                                    <i class="bi bi-quote quote-icon position-absolute top-0 start-0 mt-3 ms-3"></i>
                                    <div class="text-center mb-4">
                                        <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Avatar"
                                            class="avatar mb-3">
                                        <h5 class="mb-1">{{ $testimonial->name }}</h5>
                                        <p class="text-muted mb-0">{{ $testimonial->designation }}</p>
                                    </div>
                                    <p class="lead text-center mb-0">"{!! $testimonial->description !!}"</p>
                                </div>
                            </div>
                        @endforeach


                        {{-- <div class="carousel-item">
                            <div class="testimonial-card p-4 p-md-5">
                                <i class="bi bi-quote quote-icon position-absolute top-0 start-0 mt-3 ms-3"></i>
                                <div class="text-center mb-4">
                                    <img src="https://randomuser.me/api/portraits/men/47.jpg" alt="Avatar"
                                        class="avatar mb-3">
                                    <h5 class="mb-1">Michael Chen</h5>
                                    <p class="text-muted mb-0">Software Engineer</p>
                                </div>
                                <p class="lead text-center mb-0">"The level of customer support is outstanding. Whenever
                                    I've had a question or issue, the team has been quick to respond and always goes
                                    above and beyond to help."</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="testimonial-card p-4 p-md-5">
                                <i class="bi bi-quote quote-icon position-absolute top-0 start-0 mt-3 ms-3"></i>
                                <div class="text-center mb-4">
                                    <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Avatar"
                                        class="avatar mb-3">
                                    <h5 class="mb-1">Sophia Rodriguez</h5>
                                    <p class="text-muted mb-0">Small Business Owner</p>
                                </div>
                                <p class="lead text-center mb-0">"As a small business owner, I was hesitant to invest in
                                    new software, but this has paid for itself many times over. It's been a game-changer
                                    for my company's efficiency."</p>
                            </div>
                        </div> --}}
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
