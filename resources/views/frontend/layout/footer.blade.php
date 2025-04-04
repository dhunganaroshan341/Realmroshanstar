<footer class="footer section gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mr-auto col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <div class="logo mb-4">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3">Services</h4>
                    <div class="divider mb-4"></div>

                    <ul class="list-unstyled footer-menu lh-35">
                        @foreach ($services as $service)
                        <li><a href="#!">{{ $service->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3">Quick Links</h4>
                    <div class="divider mb-4"></div>

                    <ul class="list-unstyled footer-menu lh-35">
                        {{-- <li><a href="#!">Terms &amp; Conditions</a></li>
                        <li><a href="#!">Privacy Policy</a></li> --}}
                        <li><a href="#!">About Us</a></li>
                        <li><a href="#!">Blog</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="widget widget-contact mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3">Get in Touch</h4>
                    <div class="divider mb-4"></div>

                    <div class="footer-contact-block mb-4">

                        <h4 class="mt-2"><i class="fa-solid fa-envelope"></i> <a
                                href="mailto:{{ $email }}">{{ $email }}</a></h4>
                        <h4 class="mt-2"><i class="fa-solid fa-phone-square" aria-hidden="true"></i> <a
                                href="tel:{{ $contact }}"> {{ $contact }}</a></h4>
                    </div>

                    <div class="footer-contact-block">

                        <ul class="list-inline footer-socials mt-4">
                            <li class="list-inline-item">
                                <a href="{{ $facebook }}"><i class="fa-brands fa-facebook-f"></i> </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ $twitter }}"><i class="fa-brands fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ $instagram }}"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-btm py-4 mt-5">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div class="copyright">
                        Copyright © {{ date('Y') }} {{ $title }}
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-4">
                    <a class="backtop scroll-top-to reveal" href="#top">
                        <i class="icofont-long-arrow-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>