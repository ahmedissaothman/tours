<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Mail\BookingConfirmedMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Package;



class BookingController extends Controller
{



    public function index()
    {
        $bookings = Booking::all();
        return view('admin-page.view_order', compact('bookings'));
    }

    // public function dashboard()
    // {
    //     $totalBookings = Booking::count();

    //     $pendingBookings = Booking::where('status', 'pending')->count();

    //     $totalPackages = Package::count();

    //     $bookings = Booking::with('package')->get();

    //     return view('admin-page.dashboard', compact('totalBookings', 'pendingBookings', 'totalPackages', 'bookings'));
    // }

    public function dashboard()
    {
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $totalPackages = Package::count();
        
        // Retrieve bookings with associated packages
        $bookings = Booking::with('package')->get();
    
        return view('admin-page.dashboard', compact('totalBookings', 'pendingBookings', 'totalPackages', 'bookings'));
    }
    


    public function confirm($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->status = 'confirmed';
            $booking->save();

            // Send confirmation email
            Mail::to($booking->customer_email)->send(new BookingConfirmedMail($booking));

            return redirect()->back()->with('success', 'Booking confirmed successfully!');
        }

        return redirect()->back()->with('error', 'Booking not found.');
    }

    public function cancel($id)
{
    $booking = Booking::find($id);
    
    if ($booking) {
        $booking->status = 'canceled'; // Make sure this matches the enum value exactly
        $booking->save();

        return redirect()->back()->with('success', 'Booking cancelled successfully!');
    }

    return redirect()->back()->with('error', 'Booking not found.');
}

    
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'customer_email' => 'required|email',
            'phone_number' => 'nullable|string',
            'number_of_children' => 'required|integer',
            'number_of_adult' => 'required|integer',
            'booking_date' => 'required|date',
        ]);

        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'phone_number' => 'nullable|string|max:15',
            'number_of_children' => 'required|integer|min:0',
            'number_of_adult' => 'required|integer|min:1',
            'booking_date' => 'required|date',
            'package_id' => 'required|integer',
        ]);

        Booking::create($validatedData);

        return redirect()->back()->with('success', 'Booking successful!');
    }

//     public function destroy($id)
// {
//     $booking = Booking::find($id);
    
//     if ($booking) {
//         $booking->delete(); // Use soft delete if applicable
//         return redirect()->back()->with('success', 'Booking deleted successfully.');
//     }

//     return redirect()->back()->with('error', 'Booking not found.');
// }

public function destroy($id)
    {
    $booking = booking::findOrFail($id);

    $booking->delete();

    return redirect()->back()->with('success', 'Booking deleted successfully.');
    }

}



