@extends('admin-page.index')

@section('title', 'Customer Orders')

@section('content')
<div class="container">
    <h1 class="mt-4">View All Customer Bookings</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Customer Bookings</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Customer Orders
        </div>
        <div class="card-body">
            <!-- Alert for Success -->
@if(session('success'))
<div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
</div>
@endif

<!-- Alert for Error -->
@if(session('error'))
<div id="errorAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
</div>
@endif

<!-- JavaScript for Auto-Close Alerts -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Targeting both success and error alerts
    const successAlert = document.getElementById('successAlert');
    const errorAlert = document.getElementById('errorAlert');

    // Function to fade out and remove an alert
    function fadeOutAlert(alert) {
        alert.classList.add('fade-out');
        setTimeout(function() {
            alert.remove();
        }, 1000);  // Allow 1 second for fade-out effect
    }

    // Auto close success alert
    if (successAlert) {
        setTimeout(function() {
            fadeOutAlert(successAlert);
        }, 5000);  // Start fading out after 5 seconds
    }

    // Auto close error alert
    if (errorAlert) {
        setTimeout(function() {
            fadeOutAlert(errorAlert);
        }, 5000);  // Start fading out after 5 seconds
    }
});
</script>

<!-- CSS for Fade-out Effect -->
<style>
.fade-out {
    transition: opacity 1s ease;
    opacity: 0;
}
</style>


            <table id="datatablesSimple" class="table table-striped">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Number of Adults</th>
                        <th>Number of Children</th>
                        <th>Booking Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->customer_name }}</td>
                        <td>{{ $booking->customer_email }}</td>
                        <td>{{ $booking->phone_number }}</td>
                        <td>{{ $booking->number_of_adult }}</td>
                        <td>{{ $booking->number_of_children }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('Y-m-d') }}</td>
                        <td>
                            <span class="badge bg-{{ $booking->status == 'pending' ? 'warning' : ($booking->status == 'confirmed' ? 'success' : 'danger') }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td>
                            @if($booking->status == 'pending')
                            <div style="display: flex; align-items: center;">
                                <form action="{{ route('bookings.confirm', ['id' => $booking->booking_id]) }}" method="POST" style="margin-right: 5px;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm" style="padding: 5px 10px; font-size: 12px;">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                <form action="{{ route('bookings.cancel', ['id' => $booking->booking_id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" style="padding: 5px 10px; font-size: 12px;">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            </div>
                            @elseif($booking->status == 'confirmed' || $booking->status == 'canceled')
                            <div style="display: flex; align-items: center;">
                                <!-- Delete Button triggers modal -->
                                <button type="button" class="btn btn-link p-0" title="Delete" onclick="showDeleteModal('{{ $booking->booking_id }}')">
                                    <i class="fas fa-trash text-danger"></i>
                                </button>
                                <!-- Hidden Form for Deleting Package -->
                                <form id="delete-form-{{ $booking->booking_id }}" action="{{ route('bookings.destroy', $booking->booking_id) }}" method="POST" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteConfirmationLabel">Confirm Deletion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this booking?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- JavaScript to set action URL for deletion -->
            <script>
            let bookingIdToDelete;

            function showDeleteModal(bookingId) {
                bookingIdToDelete = bookingId;
                var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
                deleteModal.show();
            }

            document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
                if (bookingIdToDelete) {
                    document.getElementById('delete-form-' + bookingIdToDelete).submit();
                }
            });
            </script>

        </div>
    </div>
</div>
@endsection
