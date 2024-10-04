<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tour Details - TRAVELER</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>
<body>


    <!-- Top Bar -->
    @include('layout.topbar')

    <!-- Navbar -->
    @include('layout.navbar')
    @include('Carousel')

    <!-- Tour Details Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5">
            <div class="row">
                <!-- Tour Image -->
                <div class="col-lg-8">
                    <img class="img-fluid mb-4" src="{{ asset($package->image ?? 'assets/img/tour-detail.jpg') }}" alt="Tour Image">
                    <h1 class="text-primary">{{ $package->name ?? 'Explore the Beautiful Beaches of Mauritius' }}</h1>
                    <p class="text-muted">Duration: {{ $package->duration ?? '5 Days / 4 Nights' }} | Price: ${{ $package->price ?? '550' }}</p>
                    
                    <h4>About this Tour</h4>
                    <p>{{ $package->description ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.' }}</p>
                    
                    <h4>Tour Highlights</h4>
                    <ul>
                        <li>Visit pristine beaches with crystal-clear waters.</li>
                        <li>Explore local culture and cuisine.</li>
                        <li>Scenic boat rides and water sports.</li>
                        <li>Sunset views over the Indian Ocean.</li>
                    </ul>

                    <h4>What's Included</h4>
                    <ul>
                        <li>Accommodation for 4 nights</li>
                        <li>Daily breakfast and dinner</li>
                        <li>All transportation during the tour</li>
                        <li>Guided tours of the key attractions</li>
                    </ul>

                    <h4>Tour Itinerary</h4>
                    <p>Day 1: Arrival and Check-In<br>
                    Day 2: Beach Tour and Water Sports<br>
                    Day 3: Explore the Local Culture<br>
                    Day 4: Relaxation and Free Time<br>
                    Day 5: Departure</p>
                </div>

                <!-- Booking Info Sidebar -->
                <div class="col-lg-4">
                    <div class="bg-light p-4 mb-4">
                        <h4 class="text-center">Tour Information</h4>
                        <p><i class="fa fa-map-marker-alt text-primary mr-2"></i>{{ $package->location ?? 'Mauritius' }}</p>
                        <p><i class="fa fa-calendar-alt text-primary mr-2"></i>{{ $package->duration ?? '5 Days / 4 Nights' }}</p>
                        <p><i class="fa fa-users text-primary mr-2"></i>Group Size: 20</p>
                        <p><i class="fa fa-star text-primary mr-2"></i>4.7 Rating (500 reviews)</p>
                        <h5 class="text-center mt-3">${{ $package->price ?? '550' }} / per person</h5>
                        <button class="btn btn-primary btn-block mt-4" data-toggle="modal" data-target="#bookTourModal">Book Now</button>
                        <a href="#" class="btn btn-outline-primary btn-block">Contact Us</a>
                    </div>

                    <!-- Related Tours -->
                    <div class="bg-light p-4 mb-4">
                        <h4 class="text-center">Related Tours</h4>
                        <ul>
                            <li><a href="#">Tropical Island Adventure</a></li>
                            <li><a href="#">Cultural Heritage Tour</a></li>
                            <li><a href="#">Nature and Wildlife Expedition</a></li>
                        </ul>
                    </div>

                    <!-- Testimonials -->
                    <div class="bg-light p-4 mb-4">
                        <h4 class="text-center">Testimonials</h4>
                        <p>"Amazing experience! Highly recommended."</p>
                        <p>"The best vacation I've ever had."</p>
                    </div>

                    <!-- Booking Guide -->
                    <div class="bg-light p-4 mb-4">
                        <h4 class="text-center">Booking Guide</h4>
                        <p>Follow these steps to book your tour:</p>
                        <ol>
                            <li>Select your desired date.</li>
                            <li>Fill in your personal details.</li>
                            <li>Confirm your booking.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tour Details End -->

   <!-- Modal for Booking Form -->
<div class="modal fade" id="bookTourModal" tabindex="-1" aria-labelledby="bookTourModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookTourModalLabel">Book This Tour</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="package_id" value="{{ $package->package_id }}">

                    <div class="form-group">
                        <label for="customer_name">Your Name</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                    </div>
                    <div class="form-group">
                        <label for="customer_email">Your Email</label>
                        <input type="email" class="form-control" id="customer_email" name="customer_email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number">
                    </div>
                    <div class="form-group">
                        <label for="number_of_children">Number of Children</label>
                        <input type="number" class="form-control" id="number_of_children" name="number_of_children" value="0">
                    </div>
                    <div class="form-group">
                        <label for="number_of_adult">Number of Adults</label>
                        <input type="number" class="form-control" id="number_of_adult" name="number_of_adult" value="1">
                    </div>
                    <div class="form-group">
                        <label for="booking_date">Booking Date</label>
                        <input type="date" class="form-control" id="booking_date" name="booking_date" required>
                    </div>
                    <input type="hidden" name="status" value="Pending">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirm Booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

                <!-- Modal for Success Message -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Booking Successful!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Your tour booking was successful. We look forward to seeing you!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



    <!-- Footer -->
    @include('layout.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <script>

@if(session('success'))
    $(document).ready(function() {
        $('#successModal').modal('show');
    });
@endif

    </script>

</body>
</html>