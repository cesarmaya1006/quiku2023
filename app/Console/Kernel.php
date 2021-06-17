<?php

namespace App\Console;

use App\Mail\PruebaCron;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            //=================================================================================
            // $pqrs = PQR::all();
            // foreach ($pqrs as $pqr) {
            //     $pqr['estadospqr_id'] = 5;
            //     PQR::findOrFail($pqr['id'])->update($pqr);
            // }
            return 0;
            //=================================================================================
        })->daily();
        // })->everyMinute();	
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
