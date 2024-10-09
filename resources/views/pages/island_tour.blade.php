<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Island Tour - TRAVELER</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">


</head>
<body>
    <!-- Top Bar -->
    @include('layout.topbar')
    
    <!-- Navbar -->
    @include('layout.navbar')
    @include('Carousel')
    {{-- @include('pages.packages') --}}
    <!-- Island Tour Section -->

<!-- Island Tours Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Island Tours</h6>
            <h1>Explore Our Island Tours</h1>
        </div>
        <div class="row">
            @foreach($packages as $package)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="tour-item bg-white mb-2">
            <a href="{{ route('more.details', ['id' => $package->package_id]) }}">
                <img class="img-fluid" src="{{ asset($package->image) }}" alt="{{ $package->name }}">
            </a>
            <div class="p-4">
                <!-- Title is now before the description -->
                <a class="h5 text-decoration-none" href="{{ route('more.details', ['id' => $package->package_id]) }}">{{ $package->name }}</a>
                <h6 class="text-muted mt-2">{{ $package->description }}</h6> <!-- Description below the title -->
                <div class="border-top mt-4 pt-4">
                    <div class="d-flex justify-content-between">
                        <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>{{ $package->rating }} <small>({{ $package->reviews }} reviews)</small></h6>
                        <h5 class="m-0">${{ $package->price }}</h5>
                    </div>
                </div>
            </div>
            <div class="text-center mt-2">
                <a href="{{ route('more.details', ['id' => $package->package_id]) }}" class="btn btn-primary">Learn More <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
@endforeach

        

        </div>
    </div>
</div>
<!-- Island Tours End -->



    <!-- Footer -->
    @include('layout.footer')

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="assets/lib/easing/easing.min.js"></script>
    <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

</body>
</html>
