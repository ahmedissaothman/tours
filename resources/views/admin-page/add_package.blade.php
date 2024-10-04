<!-- resources/views/add_package.blade.php -->
@extends('admin-page.index')

@section('title', 'Add New Package')

@section('content')
<div class="container">
    <h2 class="mb-4">Add New Package</h2>

    <form>
        <div class="mb-3">
            <label for="package_name" class="form-label">Package Name</label>
            <input type="text" class="form-control" id="package_name" placeholder="Enter package name">
        </div>

        <div class="mb-3">
            <label for="package_type" class="form-label">Package Type</label>
            <select class="form-select" id="package_type">
                <option value="" disabled selected>Select a package type</option>
                <option value="Island">Island</option>
                <option value="Adventure">Adventure</option>
                <option value="City Tour">City Tour</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price ($)</label>
            <input type="number" class="form-control" id="price" placeholder="Enter price" min="0" step="0.01">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="4" placeholder="Enter package description"></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Package Image</label>
            <input class="form-control" type="file" id="image">
        </div>

        <button type="submit" class="btn btn-primary">Add Package</button>
    </form>
</div>
@endsection
