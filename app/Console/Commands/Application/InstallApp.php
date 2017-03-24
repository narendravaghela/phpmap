<?php

namespace App\Console\Commands\Application;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use App\Notifications\Application\AppInstalledNotification;

class InstallApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs PHPMap';

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
        $this->initialSetup();
        $this->createAdmin();
        $this->importUsers();
    }

    public function initialSetup()
    {
        $this->line('Generating Application-Key..');
        $msgKeyGenerate = Artisan::call('key:generate');
        $this->info('Application-Key successfully generated.');

        $this->line('Migrating Database..');
        $msgDBMigration = Artisan::call('migrate', [
            '--force' => true,
        ]);
        $this->info('Database successfully migrated.');
    }

    public function createAdmin()
    {
        if ($this->confirm('Do you want to create an admin user?')) {
            $name = $this->ask('What´s the admin name?');
            $username = $this->ask('What´s the admin username?');
            $email = $this->ask('What´s the admin email?');
            $password = $this->secret('What´s the admin password?');
            
            $headers = ['Name', 'Username', 'Email'];

            $adminUser = [[$name, $username, $email]];

            $this->table($headers, $adminUser);

            if ($this->confirm('Is this correct?')) {
                $user = new User();

                $user->create([
                    'name' => $name,
                    'username' => $username,
                    'email' => $email,
                    'password' => bcrypt($password),
                    'is_admin' => true,
                    'affiliate_id' => str_random(10),
                ]);

                $user->notify(new AppInstalledNotification($user));

                $this->info('The user "'.$username.'" was successfully created.');
            }
        }
    }

    public function importUsers()
    {
        if ($this->confirm('Do you want to import the users?')) {
            $this->line('Importing Users..');
            $msgUserImport = Artisan::call('import:users');
            $this->info('Users successfully imported.');
        }
    }
}
