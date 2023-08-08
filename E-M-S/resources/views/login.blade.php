<body>
    
    @extends('frontend.layout')
    @section('content')

    

    {{-- //////////login form/////////// --}}
<pre>


</pre>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 ">
                <div class="loginimgp">
                    <img src="{{asset('frontend/img/login.svg')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <form class="loginimgp">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div><br>
                    <button type="submit" class="btn btn-custom">Sign In</button>
                  <span>
                    <a href="#" class="ml-2">Forgot Password?</a><br><br>
                    <a href="{{route('signup')}}">Didn't have an account? <b>Sign Up</b></a>
                  </span><br>
                    <div class="form-group d-grid gap-2">
                        <button type="button" class="btn btn-primary " onclick="loginWithFacebook()">Login with Facebook</button>
                        <button type="button" class="btn btn-success " onclick="loginWithGoogle()">Login with Google</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <pre>

    </pre>
    @endsection
    
   
</body>