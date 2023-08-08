
<body>

@extends('frontend.layout')
@section('content')

    <!-- ///////////////  HERO SECTION //////////////// -->
    <section id="hero-section" class="container-fluid sec-bg1">

        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <img src="{{asset('frontend/img/contact-4.svg')}}" style="height: 500px; width: 500px;" "Contact" class="img-fluid">
            </div>
        </div>

    </section>

    <!-- ///////////////  CONTACT SECTION //////////////// -->

    <h2 class="text-center my-4">Contact Us</h2>
    <div class="container ">

        <div class="row">

            <!-- Left Side Column  -->
            <div class="col-md-5 p-4 d-flex align-items-stretch justify-content-center">

                <div class="row g-3 p-4 contact-info">

                    <div class="col-12 form-label text-center">
                        <h4>Information</h4>
                    </div>

                    <div class="col-12 d-flex">
                        <div class="icon">
                            <i class="fa-solid fa-location-dot rounded-circle"></i>
                        </div>
                        <div class="location">
                            <h4>Location:</h4>
                            <span>Al-Khawarizmi Institute of Computer Science</span>
                        </div>
                    </div>

                    <div class="col-12 d-flex">
                        <div class="icon">
                            <i class="fa-solid fa-address-book rounded-circle"></i>
                        </div>
                        <div class="contact">
                            <h4>Contact:</h4>
                            <span>+98 8455 85944</span>
                        </div>
                    </div>

                    <div class="col-12 d-flex">
                        <div class="icon">
                            <i class="fa-solid fa-envelope rounded-circle"></i>
                        </div>
                        <div class="email">
                            <h4>Email:</h4>
                            <span>syed.0.0.bilal@gmail.com
                                
                            </span>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3399.0356232154245!2d74.35526557554064!3d31.578070974187664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39191b279a48a93d%3A0x96433dccc6ab9cb3!2sAl-Khawarizmi%20Institute%20of%20Computer%20Science!5e0!3m2!1sen!2s!4v1690348630643!5m2!1sen!2s"
                                width="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                </div>

            </div>

            <!-- RIght Side Column -->
            <div class="col-md-7 p-4 d-flex align-items-stretch justify-content-center">

                <form name="contact-form">
                    <div class="row g-3 p-4 contact-form">

                        <div class="col-12 form-label text-center">
                            <h4>Message</h4>
                        </div>

                        <div class="col-lg-6">
                            <div>
                                <label class="form-label" for="name">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control form-control-lg rounded-1 shadow-none contact-input" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div>
                                <label class="form-label" for="email">Email</label>
                                <input type="email" name="email" id="email"
                                    class="form-control form-control-lg rounded-1 shadow-none contact-input" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <div>
                                <label class="form-label" for="subject">Subject</label>
                                <input type="text" name="subject" id="subject"
                                    class="form-control form-control-lg rounded-1 shadow-none contact-input" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <div>
                                <label class="form-label" for="message">Message</label>
                                <textarea name="message" id="message"
                                    class="form-control form-control-lg rounded-1 shadow-none contact-input"
                                    rows="5"></textarea>
                            </div>
                        </div>

                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-custom">
                                Send Message
                            </button>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


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
