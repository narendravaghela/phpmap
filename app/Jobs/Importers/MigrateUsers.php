<?php

namespace App\Jobs\Importers;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class MigrateUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $users;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($users)
    {
        $this->users = $users;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $adminUser = User::where('is_admin', 1)->first();

        foreach ($this->users as $user) {
            if (! $adminUser->username == $user->username) {
                $migrated = new User();
                $migrated->create([
                    'name' => $user->name,
                    'username' => $user->username,
                    'email' => $user->email,
                    'password' => bcrypt('pleaseUpdateMe'),
                    'lat' => $user->lat,
                    'lng' => $user->lng,
                    'address' => $user->address,
                    'city' => $user->city,
                    'country' => $user->country,
                    'company' => $user->company,
                    'website' => $user->website,
                    'affiliate_id' => str_random(10),
                ]);
            }
        }
    }
}
