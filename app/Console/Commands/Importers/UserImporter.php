<?php

namespace App\Console\Commands\Importers;

use App\User;
use Illuminate\Console\Command;

class UserImporter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrates Users from the old phpmap.co';

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
        $url = "https://phpmap.co/public/users";

        $users = json_decode(file_get_contents($url));

        $array = array($users);

        foreach ($users as $user) {
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
                'affiliate_id' => str_random(10)
            ]);
        }
    }
}
