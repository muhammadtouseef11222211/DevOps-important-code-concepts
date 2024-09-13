<body>

  @extends('frontend.layout')
  @section('content')

  {{-- //////////////// signup //////////////////////// --}}


  <div class="container mt-5">
      <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="signinp">
                  <img src="{{asset('frontend/img/Sign up.svg')}}" alt="">
              </div>
          </div>
          <div class="signinp col-lg-6 col-md-6 col-sm-12">
              <!-- navbar -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                      <a class="nav-link active" id="userSignup-tab" data-bs-toggle="tab" href="#userSignup"
                          role="tab" aria-controls="userSignup" aria-selected="true">
                          <h4>User Signup</h4>
                      </a>
                  </li>
                  <li class="nav-item" role="presentation">
                      <a class="nav-link" id="eventOrganizerSignup-tab" data-bs-toggle="tab"
                          href="#eventOrganizerSignup" role="tab" aria-controls="eventOrganizerSignup"
                          aria-selected="false">
                          <h4>Event Organizer Signup</h4>
                      </a>
                  </li>
              </ul>

              <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="userSignup" role="tabpanel"
                      aria-labelledby="userSignup-tab">
                      <!-- User Signup content goes here -->
                      <form id="userSignupForm">
                          <!-- User signup form fields here -->
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="tel" class="form-control" id="phoneNumber" required>
                        </div>
                        <div class="form-group">
                            <div class="form-check-label">
                                <input class="button radio" type="radio" name="gender" value="male"> Male
                                <input class="button radio" type="radio" name="gender" value="female"> Female
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                        <div class="form-group">
                            <label for="repeatPassword">Repeat Password</label>
                            <input type="password" class="form-control" id="repeatPassword" required>
                        </div>
                         
                        <button type="submit" class="btn btn-custom">Sign Up</button>
                        <br>
                        <br>
                          <span class="mt-3"><a href="{{route('login')}}"><b>Back to Login?</b></a></span>
                          </form>
                      </form>
                  </div>


                  <div class="tab-pane fade" id="eventOrganizerSignup" role="tabpanel"
                      aria-labelledby="eventOrganizerSignup-tab">
                      <!-- Event Organizer Signup content goes here -->
                      <form id="eventOrganizerSignupForm">
                          <!-- Event organizer signup form fields here -->
                          <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" id="name" required>
                          </div>
                          <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" id="email" required>
                          </div>
                          <div class="form-group">
                              <label for="phoneNumber">Phone Number</label>
                              <input type="tel" class="form-control" id="phoneNumber" required>
                          </div>
                          <div class="form-group">
                              <div class="form-check-label">
                                  <input class="button radio" type="radio" name="gender" value="male"> Male
                                  <input class="button radio" type="radio" name="gender" value="female"> Female
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="companyName">Company Name</label>
                              <input type="text" class="form-control" id="companyName" required>
                          </div>
                          <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" class="form-control" id="password" required>
                          </div>
                          <div class="form-group">
                              <label for="repeatPassword">Repeat Password</label>
                              <input type="password" class="form-control" id="repeatPassword" required>
                          </div>
                          
                          <button type="submit" class="btn btn-custom">Sign Up</button>
                          <br>
                           <br>
                         <span class="mt-3"><a href="{{route('login')}}"><b>Back to Login?</b></a></span>
                      </form>                     
                  </div>

              </div>

          </div>
      </div>
  </div>

<pre>








</pre>
  @endsection
</body>