<!-- resources/views/view_recommended_packages.blade.php -->
@extends('admin-page.index')

@section('title', 'Recommended Packages')

@section('content')
<div class="container">
    <h2 class="mb-4">Recommended Packages</h2>

    <!-- Button to Open the Modal for Adding New Recommended Package -->
    <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addRecommendedPackageModal">
        Add New Recommended Package
    </button>

    <!-- Modal for Adding New Recommended Package -->
    <div class="modal fade" id="addRecommendedPackageModal" tabindex="-1" aria-labelledby="addRecommendedPackageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRecommendedPackageModalLabel">Add New Recommended Package</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addRecommendedPackageForm">
                        <div class="mb-3">
                            <label for="recommendedPackageName" class="form-label">Package Name</label>
                            <input type="text" class="form-control" id="recommendedPackageName" required>
                        </div>
                        <div class="mb-3">
                            <label for="recommendedPackageType" class="form-label">Package Type</label>
                            <select class="form-select" id="recommendedPackageType" required>
                                <option value="Island">Island</option>
                                <option value="Adventure">Adventure</option>
                                <option value="City">City</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recommendedPackagePrice" class="form-label">Price ($)</label>
                            <input type="number" class="form-control" id="recommendedPackagePrice" required>
                        </div>
                        <div class="mb-3">
                            <label for="recommendedPackageDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="recommendedPackageDescription" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="recommendedPackageImage" class="form-label">Package Image</label>
                            <input type="file" class="form-control" id="recommendedPackageImage" accept="image/*" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addRecommendedPackage()">Add Package</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Recommended Package List
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
                    <tr>
                        <td>Beach Holiday</td>
                        <td>Island</td>
                        <td>500</td>
                        <td>Enjoy a relaxing beach holiday in paradise.</td>
                        <td>
                            <a href="javascript:void(0);" onclick="editRecommendedPackage(1)" title="Edit">
                                <i class="fas fa-edit text-primary me-2"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="deleteRecommendedPackage(1)" title="Delete">
                                <i class="fas fa-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function addRecommendedPackage() {
        const packageName = document.getElementById('recommendedPackageName').value;
        const packageType = document.getElementById('recommendedPackageType').value;
        const packagePrice = document.getElementById('recommendedPackagePrice').value;
        const packageDescription = document.getElementById('recommendedPackageDescription').value;
        const packageImage = document.getElementById('recommendedPackageImage').files[0];

        // Placeholder for adding package logic
        alert(`Adding Recommended Package:\nName: ${packageName}\nType: ${packageType}\nPrice: ${packagePrice}\nDescription: ${packageDescription}\nImage: ${packageImage.name}`);

        // Close the modal after adding
        var modal = bootstrap.Modal.getInstance(document.getElementById('addRecommendedPackageModal'));
        modal.hide();
        
        // Reset form fields
        document.getElementById('addRecommendedPackageForm').reset();
    }

    function editRecommendedPackage(packageId) {
        alert('Editing recommended package ID: ' + packageId);
    }

    function deleteRecommendedPackage(packageId) {
        alert('Deleting recommended package ID: ' + packageId);
    }
</script>
@endsection
