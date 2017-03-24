<?php

namespace App\Console\Commands\Users\Address;

use App\Notifications\Users\NoAddressReminder;
use App\User;
use Illuminate\Console\Command;

class CheckNoAddress extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:check-no-address';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks for users without address';

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
     * @return mixed
     */
    public function handle()
    {
        $users = User::where('address', null)->get(['username', 'email', 'created_at'])->toArray();
        $users_count = User::where('address', null)->count();
        $headers = ['Name', 'Email', 'Created'];

        if ($users) {
            $this->info('There are '.$users_count.' users without an address.');
            $this->table($headers, $users);
        } else {
            $this->info('Seems that all users have a valid address in their records.');
        }

        if (! $users_count == null) {
            if ($this->confirm('Do you want to send them a address reminder?')) {
                $noAddress = User::where('address', null)->get();

                $this->line('Sending address reminders..');
                foreach ($noAddress as $user) {
                    $user->notify(new NoAddressReminder($user));
                }
                $this->info('All address reminders are sent!');
            }
        }
    }
}
