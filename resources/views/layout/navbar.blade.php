<!-- Navbar Start -->
<div class="container-fluid position-relative nav-bar p-0">
    <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
            <a href="{{ route('welcome') }}" class="navbar-brand">
                <h1 class="m-0 text-primary"><span class="text-dark">TRAVEL</span>ER</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href="{{ route('welcome') }}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">About</a>
                    <a href="#" class="nav-item nav-link">Services</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Tour Packages</a>
                        <div class="dropdown-menu border-0 rounded-0 m-0">
                            <a href="{{route('island-tour')}}" class="dropdown-item {{ Request::is('island-tour') ? 'active' : '' }}">Island Tour</a>
                            <a href="{{route('boat-tour')}}" class="dropdown-item {{ Request::is('boat-tour') ? 'active' : '' }}">Boat Tour</a>
                            <a href="{{route('combination-tour')}}" class="dropdown-item {{ Request::is('combination-tour') ? 'active' : '' }}">Combination Tour</a>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact Us</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->



{{-- <!-- Trigger for Modal -->
<a href="#" data-toggle="modal" data-target="#registerModal" class="btn btn-primary">Sign Up Now</a> --}}

<!-- Registration Modal Start -->
{{-- <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary justify-content-center">
                <h5 class="modal-title text-white" id="registerModalLabel" style="text-align: center;">Sign Up Now</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name Input -->
                    <div class="form-group">
                        <input type="text" name="name" class="form-control p-4" placeholder="Your name" required />
                    </div>

                    <!-- Email Input -->
                    <div class="form-group">
                        <input type="email" name="email" class="form-control p-4" placeholder="Your email" required />
                    </div>

                    <!-- Password Input -->
                    <div class="form-group">
                        <input type="password" name="password" class="form-control p-4" placeholder="Password" required />
                    </div>

                    <!-- Destination Input -->
                    <div class="form-group">
                        <select name="destination" class="custom-select px-4" style="height: 47px;" required>
                            <option value="" disabled selected>Select a destination</option>
                            <option value="1">Destination 1</option>
                            <option value="2">Destination 2</option>
                            <option value="3">Destination 3</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="btn btn-block py-3" style="background-color: #68B547; color: white;">Sign Up Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
<!-- Registration Modal End -->




<!-- Login Modal Start -->
{{-- <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary justify-content-center">
                <h5 class="modal-title text-white" id="loginModalLabel">Login</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email Input -->
                    <div class="form-group">
                        <input type="email" name="email" class="form-control p-4" placeholder="Your email" required="required" />
                    </div>

                    <!-- Password Input -->
                    <div class="form-group">
                        <input type="password" name="password" class="form-control p-4" placeholder="Password" required="required" />
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="btn btn-block py-3" style="background-color: #68B547; color: white; text-align: center;">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
<!-- Login Modal End -->

