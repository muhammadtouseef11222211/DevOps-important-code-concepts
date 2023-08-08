<body>
    @extends('frontend.layout')
    @section('content')
    <div id="home"></div>
   
    <style>
    /* internal styles for the hero section */
        .hero-section {
            background-image: linear-gradient(rgba(42, 56, 70, 0.4), rgba(51, 73, 93,0.4)), url({{asset('frontend/img/Herosec.png')}});
            background-size: cover;
            background-position: center;
            height: 80vh;
            /* background-attachment: fixed; */
            display: center;
            justify-content: center;
            padding-top: 15vh;
        }
        /* END */</style>

     <!-- HERO SECTION -->
     <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                 
                </div>
            </div>
        </div>
    </section>

    </div>
    <!-- ABOUT SECTION -->
    <section class="about-section sec-bg2" id="about">
        <div class="container ">
            <div class="row">
                <div class="col-lg-6 col-md-12 sm-12">
                    <h2>About Us</h2>
                    <p>Welcome to <strong>Your Event Management System</strong> - Your Trusted Event Planning
                        Partner!</p>
                    <p>At Your Event Management System Name, we are passionate about creating extraordinary events that
                        leave a lasting impression. With a team of dedicated professionals and a wealth of experience in
                        the event industry, we have been delivering seamless and unforgettable event experiences for our
                        clients.</p>

                </div>
                <div class="col-lg-6 col-md-12 sm-12">
                    <h3>Our Mission</h3>
                    <p>Our mission is to bring your vision to life. We understand that every event is unique and holds a
                        special place in your heart. Whether it's a corporate gathering, a dream wedding, or a milestone
                        celebration, we strive to turn your ideas into reality, crafting an event that reflects your
                        style and personality.</p>
                </div>
            </div>
            <div class=" btn btn-custom "><a href="{{route('about')}}" style="color: white; text-decoration:none;">Learn more</a></div>
        </div>
    </section>
    <!-- OUR SERVICES SECION -->
    <section class="services-section sec-bg1" id="service">
        <div class="container">
            <h2 class="text-center">Services</h2>
            <div class="row">
                <div class="col-lg-12 md-12 sm-12">
                    <p>
                        For an <b>Event Management System Website</b> , the services content should highlight the
                        various offerings and features provided by the platform to help users plan, organize, and
                        execute successful events. <br> Here are some service descriptions that you can include:
                    </p>
                </div> 
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Event Planning</h5>
                            <p class="card-text">Let us handle every detail of your event, from concept development to
                                execution. We'll work closely with you to understand your vision and turn it into a
                                memorable reality.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Vendor Coordination</h5>
                            <p class="card-text">We have a vast network of trusted vendors, including caterers,
                                decorators, photographers, and entertainment providers. We'll coordinate with them to
                                ensure seamless service on your special day.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Event Marketing and Promotion</h5>
                            <p class="card-text">Assist clients in promoting their events through digital marketing,
                                social media campaigns, and other promotional strategies to maximize attendance.</p>
                        </div>
                    </div>
                </div>
              
            </div>
            <br>
            <div class=" btn btn-custom"><a href="{{route('service')}}" style="color: white; text-decoration:none;">Learn more</a></div>
        </div>
    </section>
    <!-- END -->
    <!-- Portfolio SECTION -->
    <section class="portfolio-section sec-bg2" id="portfolio">
        <div class="container">
            <h2 class="text-center">Portfolio</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="portfolio-item">
                        <a href="{{asset('frontend/img/portf1.jpeg')}}" data-toggle="lightbox" data-gallery="portfolio-gallery">
                            <img src="{{asset('frontend/img/portf1.jpeg')}}" class="img-fluid" alt="Event 1">
                        </a>
                        <!-- <div class="portfolio-caption">
                                <h4>Corporate Conference</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel arcu quis orci
                                    dignissim scelerisque.</p>
                            </div> -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="portfolio-item">
                        <a href="{{asset('frontend/img/portf2.jpeg')}}" data-toggle="lightbox" data-gallery="portfolio-gallery">
                            <img src="{{asset('frontend/img/portf2.jpeg')}}" class="img-fluid" alt="Event 2">
                        </a>
                        <!-- <div class="portfolio-caption">
                                <h4>Wedding Celebration</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel arcu quis orci
                                    dignissim scelerisque.</p>
                            </div> -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="portfolio-item">
                        <a href="{{asset('frontend/img/portf3.jpeg')}}" data-toggle="lightbox" data-gallery="portfolio-gallery">
                            <img src="{{asset('frontend/img/portf3.jpeg')}}" class="img-fluid" alt="Event 3">
                        </a>
                        <!-- <div class="portfolio-caption">
                                <h4>Social Gathering</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel arcu quis orci
                                    dignissim scelerisque.</p>
                            </div> -->
                    </div>
                </div>
            </div>
            <div class=" btn btn-custom"><a href="{{route('portfolio')}}" style="color: white; text-decoration:none;">More</a></div>
        </div>
    </section>
    <!-- END -->


    <footer class=" sec-bg1">

        <div class="footer-content" style=" padding: 50px 0;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h4>Join Our Newsletter</h4>
                        <p>Don't miss out on the opportunity to be part of our vibrant event community.</p>
                        <form action method="post">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Your email"
                                    aria-label="Your email" aria-describedby="subscribe-button">
                                <button class="btn btn-custom" type="submit" id="subscribe-button">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>