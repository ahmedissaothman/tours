<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Package;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     // Make sure the query is correct
    //     $bookings = Booking::join('packages', 'bookings.package_id', '=', 'packages.package_id')
    //         ->select('bookings.customer_name', 'packages.name as package_name', 'bookings.booking_date', 'bookings.status')
    //         ->get();

    //     // Pass the $bookings variable to the view
    //     return view('admin-page.dashboard', compact('bookings'));
    // }

    public function index()
    {
        // Retrieve bookings with related package data
        $bookings = Booking::with('package')->get();

        return view('admin-page.dashboard', compact('bookings'));
    }
}
