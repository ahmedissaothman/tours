<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingConfirmedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking; // Public property for booking data

    /**
     * Create a new message instance.
     */
    public function __construct($booking)
    {
        $this->booking = $booking; // Assign booking to the class property
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Booking Confirmed')
                    ->view('emails.booking_confirmed'); // Use the correct view path
    }
}
