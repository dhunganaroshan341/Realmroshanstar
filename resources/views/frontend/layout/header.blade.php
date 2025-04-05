<header>
    <div class="header-top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <ul class="top-bar-info list-inline-item ps-0 mb-0">
                        <li class="list-inline-item"><a href="mailto:{{ $email }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                                </svg>
                                {{ $email }}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="text-md-end top-right-bar mt-2 mt-lg-0 call-now">
                        <a href="tel:{{ $contact }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                            </svg>
                            <!-- <span class="support-icon">Call Now : </span> -->
                            <span class="h5">{{ $contact }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar  sticky-top navbar-expand-lg navigation" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('first.index') }}">
                @if ($logo && $logo!=null)
                <img src="{{ asset('storage/' . $logo) }}" alt="" class="img-fluid">
                @endif
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
                aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icofont-navigation-menu"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarmain">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active"><a class="nav-link" href="{{ route('first.index') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about-us') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('service') }}">Services</a></li>
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ route('blog') }}">Blog</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>