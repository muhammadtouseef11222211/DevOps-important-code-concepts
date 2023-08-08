
<body>
  @extends('frontend.layout')
  @section('content')
  <div id="home"></div>
  <!-- Navigation-->

  <div class="container-fluid sec-bg2" id="service">
    <div class="row">
      <div class="col-lg-12 d-flex justify-content-center align-items-center">
        <!-- Image added here -->
        <img src="{{asset('frontend/img/services.png')}}" alt="Event Management Team" class="img-fluid" style="background-color: #33495d;">
      </div>
    </div>
  </div>
  
  



  <!-- OUR SERVICES SECION -->
  <section class="services-section sec-bg1" >
    <div class="container">
      <h2 class="text-center">Our Services</h2>
      <div class="row">
       
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Event Planning</h5>
              <p class="card-text">Let us handle every detail of your event, from concept development to execution.
                We'll work closely with you to understand your vision and turn it into a memorable reality.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Vendor Coordination</h5>
              <p class="card-text">We have a vast network of trusted vendors, including caterers, decorators,
                photographers, and entertainment providers. We'll coordinate with them to ensure seamless service on
                your special day.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Event Marketing and Promotion</h5>
              <p class="card-text">Assist clients in promoting their events through digital marketing, social media
                campaigns, and other promotional strategies to maximize attendance.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Event Photography and Videography</h5>
              <p class="card-text">Offer professional photography and videography services to capture and preserve the
                memories of the event.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Catering and Food Services</h5>
              <p class="card-text">Partner with catering companies to provide a diverse range of menu options, catering
                to different dietary preferences and cultural preferences.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Entertainment Planning</h5>
              <p class="card-text">Arrange entertainment options such as live bands, DJs, dancers, magicians, or other
                performers to keep guests entertained and engaged throughout the event.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




  <!-- END -->
  @endsection


</body>

