<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Batch;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendReminderEmail;
use App\Models\User;
use App\Models\Reservation;
use App\Mail\ReminderEmail;
use Carbon\Carbon;


class SendReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder emails at 7:00';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::today();
        $reservations = Reservation::where('date', $today)->get();
        // $data = QRコード情報

        foreach($reservations as $reservation){
            return Mail::to($reservation->user->email)->send(new ReminderEmail($reservations));
        }

    }
}

