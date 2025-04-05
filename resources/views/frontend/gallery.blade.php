@extends('frontend.layouts.app')

@php
    $galleries = [
        [
            'client' => 'Mr. Smith',
            'albums' => [
                [
                    'name' => 'Gallery 1',
                    'type' => 'image',
                    'items' => [
                        'assets/images/banner1.jpg',
                        'assets/images/banner.jpg',
                        'assets/images/banner24.jpg',
                    ]
                ],
                [
                    'name' => 'Gallery 2',
                    'type' => 'image',
                    'items' => [
                        'assets/images/banner22.jpg',
                        'assets/images/banner1.jpg',
                    ]
                ]
            ]
        ],
        [
            'client' => 'Mr. Doe',
            'albums' => [
                [
                    'name' => 'Gallery 1',
                    'type' => 'image',
                    'items' => [
                        'assets/images/banner1.jpg',
                        'assets/images/banner.jpg',
                        'assets/images/banner24.jpg',
                    ]
                ],
                [
                    'name' => 'Gallery 2',
                    'type' => 'image',
                    'items' => [
                        'assets/images/banner1.jpg',
                        'assets/images/banner.jpg',
                        'assets/images/banner24.jpg',
                    ]
                ],
                [
                    'name' => 'Gallery 3',
                    'type' => 'image',
                    'items' => [
                        'assets/images/banner1.jpg',
                        'assets/images/banner.jpg',
                        'assets/images/banner24.jpg',
                    ]
                ]
            ]
        ],
        [
            'client' => 'Mr. Watson',
            'albums' => [
                [
                    'name' => 'Promo Videos',
                    'type' => 'video',
                    'items' => [
                        'assets/videos/promo1.mp4',
                        'assets/videos/promo2.mp4',
                    ]
                ]
            ]
        ],
    ];
@endphp

@section('content')
<div class="container py-5" style="margin-right: 270px;">
    <h1 class="mb-4 text-center" style="color: #bfa980;">Gallery</h1>

    <div id="albumsContainer" class="gallery"></div>
</div>

<!-- Client Sidebar -->
<div class="client-sidebar">
    <h5 class="text-center mb-4" style="color: #bfa980;">Our Clients</h5>
    @foreach ($galleries as $index => $gallery)
    <div class="client-item d-flex align-items-center justify-content-between" onclick="selectClient({{ $index }})">
        <div>
            <strong>{{ $gallery['client'] }}</strong>
            <div class="text-muted small">
                <!-- Count all images in all albums for this client -->
                {{ count(array_merge(...array_map(fn($album) => $album['items'], $gallery['albums']))) }}
                {{ Str::plural('item', count(array_merge(...array_map(fn($album) => $album['items'], $gallery['albums'])))) }}
            </div>
        </div>
        <div class="badge bg-light text-dark rounded-circle" style="padding: 8px 12px;">
            {{ $index + 1 }}
        </div>
    </div>
@endforeach

</div>

<!-- Slider Overlay -->
<div class="slider-overlay" id="sliderOverlay">
    <div class="close-slider" onclick="closeSlider()">&times;</div>
    <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" id="carouselContent"></div>
        <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Gallery Styles */
    .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        grid-gap: 15px;
    }

    .gallery img,
    .gallery video {
        aspect-ratio: 16/10;
        width: 100%;
        object-fit: cover;
        border-radius: 10px;
        transition: transform 0.3s;
        cursor: pointer;
    }

    .gallery img:hover,
    .gallery video:hover {
        transform: scale(1.05);
    }

    /* Sidebar Styling */
    .client-sidebar {
        position: fixed;
        top: 0;
        right: 0;
        width: 250px;
        height: 100vh;
        background-color: #1e1e1e;
        padding: 20px;
        overflow-y: auto;
        border-left: 2px solid #444;
    }

    .client-sidebar h5 {
        font-weight: bold;
        font-size: 1.25rem;
    }

    .client-item {
        padding: 15px;
        background-color: #2c2c2c;
        border-radius: 10px;
        margin-bottom: 12px;
        transition: background-color 0.3s, transform 0.2s;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .client-item:hover,
    .client-item.active {
        background-color: #bfa980;
        color: #111;
        transform: translateX(-5px);
    }

    .client-item .text-muted {
        font-size: 0.85rem;
        color: #aaa;
    }

    .client-item .badge {
        padding: 8px 12px;
        border-radius: 12px;
        background-color: #ddd;
        color: #333;
        font-size: 0.9rem;
    }
</style>
@endpush


@push('styles')
<style>
    body {
        background-color: #111;
        color: #f5f5f5;
        font-family: 'Segoe UI', sans-serif;
    }

    .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        grid-gap: 15px;
    }

    .gallery img,
    .gallery video {
        aspect-ratio: 16/10; /* Vertical feel — try 2/3 or 4/5 as well */
        width: 100%;
        object-fit: cover;
        border-radius: 10px;
        transition: transform 0.3s;
        cursor: pointer;
    }

    .gallery img:hover,
    .gallery video:hover {
        transform: scale(1.05);
    }

    .client-sidebar {
        position: fixed;
        top: 0;
        right: 0;
        width: 250px;
        height: 100vh;
        background-color: #1e1e1e;
        padding: 20px;
        overflow-y: auto;
        border-left: 2px solid #444;
    }

    .client-sidebar h5 {
        font-weight: bold;
        font-size: 1.25rem;
    }

    .client-item {
        padding: 15px;
        background-color: #2c2c2c;
        border-radius: 10px;
        margin-bottom: 12px;
        transition: background-color 0.3s, transform 0.2s;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .client-item:hover,
    .client-item.active {
        background-color: #bfa980;
        color: #111;
        transform: translateX(-5px);
    }

    .client-item .text-muted {
        font-size: 0.85rem;
        color: #aaa;
    }

    .client-item .badge {
        padding: 8px 12px;
        border-radius: 12px;
        background-color: #ddd;
        color: #333;
        font-size: 0.9rem;
    }

    .slider-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.95);
        display: none;
        z-index: 1050;
        overflow: hidden;
    }

    .slider-overlay .carousel {
        height: 100%;
    }

    .slider-overlay .carousel-item img,
    .slider-overlay .carousel-item video {
        height: 100vh;
        object-fit: contain;
        width: auto;
        margin: auto;
    }

    .close-slider {
        position: absolute;
        top: 20px;
        left: 20px;
        font-size: 2rem;
        cursor: pointer;
        z-index: 1060;
        color: #fff;
    }

    .album-title {
        font-size: 1.5rem;
        color: #bfa980;
        margin: 20px 0 10px;
    }

    /* Avatar circle for client item */
    .avatar {
        background-color: #bfa980;
        color: #fff;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin-right: 12px;
    }

</style>
@endpush


@push('scripts')
<script>
    const galleries = @json($galleries);
    let currentItems = [];

    function selectClient(index) {
        const container = document.getElementById('albumsContainer');
        const client = galleries[index];
        document.querySelectorAll('.client-item').forEach(el => el.classList.remove('active'));
        document.querySelectorAll('.client-item')[index].classList.add('active');

        container.innerHTML = '';

        client.albums.forEach((album, albumIndex) => {
            const albumDiv = document.createElement('div');
            const albumTitle = document.createElement('h3');
            albumTitle.textContent = album.name + ' (' + album.type + ')';
            albumTitle.classList.add('album-title');
            albumDiv.appendChild(albumTitle);

            const galleryDiv = document.createElement('div');
            galleryDiv.classList.add('gallery');

            album.items.forEach((item, i) => {
                const mediaEl = album.type === 'image'
                    ? document.createElement('img')
                    : document.createElement('video');

                mediaEl.src = item;
                mediaEl.setAttribute('onclick', `openSlider(${index}, ${albumIndex}, ${i})`);
                if (album.type === 'video') {
                    mediaEl.setAttribute('muted', true);
                    mediaEl.setAttribute('playsinline', true);
                }

                galleryDiv.appendChild(mediaEl);
            });

            albumDiv.appendChild(galleryDiv);
            container.appendChild(albumDiv);
        });
    }

    function openSlider(clientIndex, albumIndex, itemIndex) {
        const items = galleries[clientIndex].albums[albumIndex].items;
        const type = galleries[clientIndex].albums[albumIndex].type;
        currentItems = items;

        const carousel = document.getElementById('carouselContent');
        carousel.innerHTML = '';

        items.forEach((item, i) => {
            const slide = document.createElement('div');
            slide.classList.add('carousel-item');
            if (i === itemIndex) slide.classList.add('active');

            if (type === 'image') {
                const img = document.createElement('img');
                img.src = item;
                slide.appendChild(img);
            } else {
                const video = document.createElement('video');
                video.src = item;
                video.controls = true;
                slide.appendChild(video);
            }

            carousel.appendChild(slide);
        });

        document.getElementById("sliderOverlay").style.display = "block";
        new bootstrap.Carousel(document.getElementById('galleryCarousel')).to(itemIndex);
    }

    function closeSlider() {
        document.getElementById("sliderOverlay").style.display = "none";
    }

    // Load first client by default
    window.onload = () => selectClient(0);
</script>
@endpush
