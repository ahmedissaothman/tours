@extends('admin-page.index')

@section('title', 'All Packages')

@section('content')
<div class="container">
    <h1 class="mt-4">View All Packages</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">View Packages</li>
    </ol>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addPackageModal">
        Add New Package
    </button>

    <!-- Add New Package Modal -->
    <div class="modal fade" id="addPackageModal" tabindex="-1" aria-labelledby="addPackageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPackageModalLabel">Add New Package</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="packageName" class="form-label">Package Name</label>
                            <input type="text" class="form-control" id="packageName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="packageType" class="form-label">Package Type</label>
                            <select class="form-select" id="packageType" name="type_id" required>
                                <option value="1">Island</option>
                                <option value="2">Boat</option>
                                <option value="3">Combination</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="packagePrice" class="form-label">Price ($)</label>
                            <input type="number" class="form-control" id="packagePrice" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="packageDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="packageDescription" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="packageImage" class="form-label">Package Image</label>
                            <input type="file" class="form-control" id="packageImage" name="image" accept="image/*" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-d
                            
                            ismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Package</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Package List Table -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Package List
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped">
                <thead>
                    <tr>
                        <th>Package Name</th>
                        <th>Package Type</th>
                        <th>Price ($)</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $package)
                    <tr>
                        <td>{{ $package->name }}</td>
                        <td>{{ $package->type->type_name ?? 'N/A' }}</td>
                        <td>{{ $package->price }}</td>
                        <td>{{ $package->description }}</td>
                        <td>

                            <!-- Edit Button -->
                            <button type="button" class="btn btn-link p-0" title="Edit" data-bs-toggle="modal" data-bs-target="#editPackageModal-{{ $package->package_id }}">
                                <i class="fas fa-edit text-primary"></i>
                            </button>

                            <!-- Edit Package Modal -->
                            <div class="modal fade" id="editPackageModal-{{ $package->package_id }}" tabindex="-1" aria-labelledby="editPackageModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editPackageModalLabel">Edit Package</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('packages.update', $package->package_id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="packageName" class="form-label">Package Name</label>
                                                    <input type="text" class="form-control" id="packageName" name="name" value="{{ $package->name }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="packageType" class="form-label">Package Type</label>
                                                    <select class="form-select" id="packageType" name="type_id" required>
                                                        <option value="1" {{ $package->type_id == 1 ? 'selected' : '' }}>Island</option>
                                                        <option value="2" {{ $package->type_id == 2 ? 'selected' : '' }}>Boat</option>
                                                        <option value="3" {{ $package->type_id == 3 ? 'selected' : '' }}>Combination</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="packagePrice" class="form-label">Price ($)</label>
                                                    <input type="number" class="form-control" id="packagePrice" name="price" value="{{ $package->price }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="packageDescription" class="form-label">Description</label>
                                                    <textarea class="form-control" id="packageDescription" name="description" rows="3" required>{{ $package->description }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="packageImage" class="form-label">Package Image</label>
                                                    <input type="file" class="form-control" id="packageImage" name="image" accept="image/*">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update Package</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Button triggers modal -->
                            <button type="button" class="btn btn-link p-0" title="Delete" onclick="showDeleteModal('{{ $package->package_id }}')">
                                <i class="fas fa-trash text-danger"></i>
                            </button>

                            <!-- Hidden Form for Deleting Package -->
                            <form id="delete-form-{{ $package->package_id }}" action="{{ route('packages.destroy', $package->package_id) }}" method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this package?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Scripts -->
<script>
    let packageIdToDelete;

    function showDeleteModal(packageId) {
        // Store the package ID to delete
        packageIdToDelete = packageId;

        // Show the Bootstrap modal
        var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
        deleteModal.show();
    }

    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        // Submit the delete form when the user confirms deletion
        if (packageIdToDelete) {
            document.getElementById('delete-form-' + packageIdToDelete).submit();
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            let alert = document.getElementById('alert');
            if (alert) {
                alert.classList.add('fade-out');
                setTimeout(function() {
                    alert.remove();
                }, 500); 
            }
        }, 5000); 
    });
</script>

<style>
    .fade-out {
        transition: opacity 0.5s ease;
        opacity: 0;
    }
</style>

@endsection
