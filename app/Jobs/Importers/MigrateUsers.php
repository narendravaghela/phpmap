<?php

namespace App\Jobs\Importers;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class MigrateUsers
{
    use Dispatchable, Queueable;

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
        foreach ($this->users as $user) {
            $migrated = new User();
            $migrated->create([
                'name' => $user->name,
                'username' => $user->username,
                'email' => $user->email,
                'password' => bcrypt('pwd_'.str_slug($user->username, '_').'_UPDATE'),
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
