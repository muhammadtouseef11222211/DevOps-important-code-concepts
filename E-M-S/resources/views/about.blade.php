<body>
    @extends('frontend.layout')
    @section('content')
        <div id="home"></div>
        <!-- Navigation-->

        <!-- ABOUT SECTION -->
        <section class="about-section sec-bg2" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <h2>About Us</h2>
                        <p>Welcome to <strong>Your Event Management System Name</strong> - Your Trusted Event Planning
                            Partner!</p>
                        <p>At Your Event Management System Name, we are passionate about creating extraordinary events that
                            leave a lasting impression. With a team of dedicated professionals and a wealth of experience in
                            the event industry, we have been delivering seamless and unforgettable event experiences for our
                            clients.</p>
                        <h3>Our Mission</h3>
                        <p>Our mission is to bring your vision to life. We understand that every event is unique and holds a
                            special place in your heart. Whether it's a corporate gathering, a dream wedding, or a milestone
                            celebration, we strive to turn your ideas into reality, crafting an event that reflects your
                            style and personality.</p>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 mt-5">
                        <!-- Image added here -->
                        <img src="{{ asset('frontend/img/aboutskills.png') }}" alt="Event Management Team" class="img-fluid"
                            style="background-color: #5c748b;">

                    </div>
                </div>
            </div>
        </section>


        <section class="about-section sec-bg1 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <!-- Image added here -->
                        <img src="{{ asset('frontend/img/About.png') }}" alt="Event Management Team" class="img-fluid"
                            style="background-color: #5c748b;">

                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <h3>Empowering Event Excellence, One Step at a Time</h3>
                        <p>Gain valuable insights and track event performance with our comprehensive analytics, empowering
                            data-driven decisions.</p>


                        <!-- Progress Bar 1 -->
                        <h6>CLIENT SATISFACTION</h6>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 90%;" aria-valuenow="90"
                                aria-valuemin="0" aria-valuemax="100">90%</div>
                        </div>

                        <!-- Progress Bar 2 -->
                        <h6>COMMUNITY GROWTH</h6>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 75%;" aria-valuenow="75"
                                aria-valuemin="0" aria-valuemax="100">75%</div>
                        </div>

                        <!-- Progress Bar 3 -->
                        <h6>NUMBER OF EVENTS ORGANIZED</h6>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 55%;" aria-valuenow="55"
                                aria-valuemin="0" aria-valuemax="100">55%</div>
                        </div>

                        <!-- Progress Bar 4 -->
                        <h6>EVENT COMPLETION PROGRESS</h6>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 65%;" aria-valuenow="65"
                                aria-valuemin="0" aria-valuemax="100">65%</div>
                        </div>
                    </div>
                </div>
        </section>

        <section class="about-section sec-bg2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <h3>Why Choose <strong>Your Event Management System</strong>?</h3>
                        <ul>
                            <li><strong>Experience:</strong> With over [Number of Years] years of experience, we have honed
                                our skills and expertise in planning and executing a wide range of events, ensuring every
                                detail is meticulously taken care of.</li>
                            <li><strong>Attention to Detail:</strong> We believe that it's the little things that make a big
                                difference. Our team is committed to paying close attention to every detail, from the
                                initial planning stages to the final execution.</li>
                            <li><strong>Creativity:</strong> We are innovators and creative thinkers. Our team loves to
                                explore unique ideas and concepts, adding a touch of creativity to make your event stand out
                                from the rest.</li>
                            <li><strong>Personalized Approach:</strong> Your satisfaction is our top priority. We take the
                                time to listen to your needs and preferences, tailoring our services to suit your individual
                                requirements.</li>
                            <li><strong>Professional Network:</strong> Over the years, we have built strong relationships
                                with reputable vendors and suppliers in the industry. This network allows us to secure
                                top-notch services and products for your event.</li>
                            <li><strong>Stress-Free Experience:</strong> Planning an event can be overwhelming, but with
                                Your Event Management System Name, you can relax and enjoy the journey. We handle all the
                                logistics, leaving you free to cherish every moment of your special day.</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 mt-5">
                        <!-- Image added here -->
                        <img src="{{ asset('frontend/img/about1.png') }}" alt="Event Management Team" class="img-fluid"
                            style="background-color: #5c748b;">

                    </div>
                </div>
            </div>
        </section>
    @endsection




</body>
