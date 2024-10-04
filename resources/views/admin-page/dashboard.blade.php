@extends('admin-page.index')

@section('title', 'Dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <!-- Your cards and other content here -->
        <div class="row">
            <!-- Total Bookings Card -->
            <div class="col-md-3">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>Total Bookings</div>
                        <i class="fas fa-calendar-check fa-2x"></i>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <!-- Display total bookings dynamically -->
                        <h5>{{ $totalBookings }}</h5>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            
    
            <!-- Pending Bookings Card -->
            <div class="col-md-3">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>Pending Bookings</div>
                        <i class="fas fa-hourglass-half fa-2x"></i>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <!-- Display total pending bookings dynamically -->
                        <h5>{{ $pendingBookings }}</h5>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            
    
            <!-- Total Packages Card -->
            <div class="col-md-3">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>Total Packages</div>
                        <i class="fas fa-box fa-2x"></i>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <!-- Display total packages dynamically -->
                        <h5>{{ $totalPackages }}</h5>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            
    
            <!-- Popular Package Card -->
            <div class="col-md-3">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>Popular Package</div>
                        <i class="fas fa-star fa-2x"></i>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <h5>Luxury Safari</h5>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Monthly Bookings Overview <!-- Updated title -->
                    </div>
                    <div class="card-body">
                        <canvas id="myAreaChart" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Bookings by Package <!-- Updated title -->
                    </div>
                    <div class="card-body">
                        <canvas id="myBarChart" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Booking Details
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Package Booked</th>
                            <th>Booking Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->customer_name }}</td>
                                <td>
                                    {{ $booking->package ? $booking->package->name : 'No Package' }} <!-- Check if package exists -->
                                </td>
                                <td>{{ $booking->booking_date }}</td>
                                <td>
                                    <span class="badge 
                                        @if ($booking->status == 'pending') bg-warning 
                                        @elseif ($booking->status == 'confirmed') bg-success 
                                        @elseif ($booking->status == 'canceled') bg-danger 
                                        @endif">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
</div>
@endsection