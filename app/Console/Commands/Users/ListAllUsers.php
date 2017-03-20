<?php

namespace App\Console\Commands\Users;

use App\User;
use Illuminate\Console\Command;

class ListAllUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:list-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lists all users';

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
        $users = User::all(['username', 'email', 'created_at'])->toArray();
        $users_count = User::count();
        $headers = ['Name', 'Email', 'Created'];

        if ($users) {
            $this->info('There are ' . $users_count . ' users on PHPMap.');
            $this->table($headers, $users);
        } else {
            $this->info('Seems that there are no users..');
        }
    }
}
