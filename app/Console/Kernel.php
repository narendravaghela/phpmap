<?php

namespace App\Console;

use App\Console\Commands\Importers\UserImporter;
use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\Users\ListAllUsers;
use App\Console\Commands\Users\Address\CheckNoAddress;
use App\Console\Commands\Users\Referrals\CheckReferrals;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        CheckReferrals::class,
        CheckNoAddress::class,
        ListAllUsers::class,
        UserImporter::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
