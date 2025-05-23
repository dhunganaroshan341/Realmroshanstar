@extends('frontend.layout.main')
@section('content')
<section class="hero-small">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url({{ asset('assets/images/banner1.jpg') }}) ;">
                <div class="hero-small-background-overlay"></div>
                <div class="container  h-100">
                    <div class="row align-items-center d-flex h-100">
                        <div class="col-md-12">
                            <div class="block text-center">
                                <span class="text-uppercase text-sm letter-spacing"></span>
                                <h1 class="mb-3 mt-3 text-center">Blog & News</h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
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
        <div class="cards">
           <div class="row">
            @foreach ($posts as $post)

                <div class="col-md-4 mb-4">
                    <div class="card border-0">
                        <img src="storage/{{ $post->postImages[0]->image }}" class="card-img-top" alt="">
                        <div class="card-body p-3">
                            <h1 class="card-title mt-2"><a href="{{ route('blog-detail', $post->id) }}">{{ $post->title }} </a></h1>
                            <div class="content pt-2">
                                <p class="card-text">{!! Str::limit($post->description, 100, '...') !!}</p>
                            </div>
                            <a href="{{ route('blog-detail', $post->id) }}" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
           </div>
        </div>
    </div>
</section>
@endsection