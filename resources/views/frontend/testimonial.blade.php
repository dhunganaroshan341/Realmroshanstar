@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;800&display=swap');

    figure.snip-testimonial {
        font-family: 'Raleway', sans-serif;
        background: #fff;
        border-radius: 1%;
        padding: 30px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        margin: 20px 10px;
        text-align: center;
        transition: all 0.3s ease-in-out;
    }

    figure.snip-testimonial:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
    }

    figure.snip-testimonial img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    padding:1%;
    border-radius: 10px; /* More rounded corners like the ChatGPT chatbox */
    margin-bottom: 15px;
    border: 3px solid #121215; /* Adjust the color if you want it to match the theme more closely */
}


    figure.snip-testimonial blockquote {
        font-style: italic;
        font-size: 0.95em;
        color: #555;
        margin: 20px 0;
        line-height: 1.6;
        position: relative;
    }

    figure.snip-testimonial blockquote::before,
    figure.snip-testimonial blockquote::after {
        content: '"';
        font-size: 30px;
        color: #ccc;
        position: absolute;
    }

    figure.snip-testimonial blockquote::before {
        left: -15px;
        top: -10px;
    }

    figure.snip-testimonial blockquote::after {
        right: -15px;
        bottom: -10px;
    }

    figure.snip-testimonial .author h5 {
        font-size: 1rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 0;
    }

    figure.snip-testimonial .author span {
        display: block;
        font-size: 0.85rem;
        color: #888;
        font-weight: 500;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 40px;
        height: 40px;
        background-color: #6365f12c;
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
        bottom: -40px;
    }

    .carousel-indicators button {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #6365f1;
        opacity: 0.3;
    }

    .carousel-indicators .active {
        opacity: 1;
    }
</style>
@endpush

<div class="bg-light">
    <div class="container py-5">
        <h2 class="text-center mb-5 fw-bold">What Our Customers Say</h2>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($testimonials->chunk(2) as $index => $testimonialChunk)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <div class="row">
                                    @foreach ($testimonialChunk as $testimonial)
                                        <div class="col-md-6 d-flex align-items-stretch">
                                            <figure class="snip-testimonial w-100">
                                                <img src="{{ $testimonial->image }}" alt="{{ $testimonial->name }}">
                                                <blockquote>
                                                    {{ $testimonial->description ?? '...' }}
                                                </blockquote>
                                                <div class="author">
                                                    <h5>{{ $testimonial->name ?? 'Anonymous' }}</h5>
                                                    <span>{{ $testimonial->designation ?? 'Customer' }}</span>
                                                </div>
                                            </figure>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
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
                        @foreach ($testimonials->chunk(2) as $index => $chunk)
                            <button type="button" data-bs-target="#testimonialCarousel"
                                data-bs-slide-to="{{ $index }}"
                                class="{{ $index == 0 ? 'active' : '' }}"
                                aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                                aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
