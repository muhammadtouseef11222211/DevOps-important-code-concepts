
    <!-- Navigation-->
    
    <nav class="navbar navbar-expand-lg sticky-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#">
                <span>EMS</span>
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav nav-underline ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route('index')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('about')}}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('service')}}">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('portfolio')}}">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
                </ul>
                 <div class="getsbtn "><a href="{{route('login')}}">Get Started</a></div>
            </div>
        </div>
    </nav>
