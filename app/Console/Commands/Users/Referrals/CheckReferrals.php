<?php

namespace App\Console\Commands\Users\Referrals;

use App\User;
use Illuminate\Console\Command;

class CheckReferrals extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:check-referrals';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks for the user acquired referrals';

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
        $username = $this->ask('Whats the username?');
        $user = User::where('username', $username)->first();
        $headers = ['Name', 'Email', 'Created'];

        $users = User::where('referred_by', $user->affiliate_id)->get(['username', 'email', 'created_at'])->toArray();
        $users_count = User::where('referred_by', $user->affiliate_id)->count();

        if ($users) {
            $this->info($username . ' has referred ' . $users_count . ' users.');
            $this->table($headers, $users);
        } else {
            $this->error($username . ' has not referred any users.');
        }
    }
}
