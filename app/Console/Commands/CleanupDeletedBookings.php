<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;

class CleanupDeletedBookings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cleanup-deleted-bookings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove soft-deleted bookings older than 30 days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Delete soft-deleted bookings older than 30 days
        Booking::onlyTrashed()->where('deleted_at', '<', now()->subDays(30))->forceDelete();
        $this->info('Old soft-deleted bookings have been cleaned up.');
    }
}
