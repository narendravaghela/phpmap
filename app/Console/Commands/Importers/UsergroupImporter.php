<?php

namespace App\Console\Commands\Importers;

use App\Models\Meetups\Usergroup;
use App\Models\Meetups\UsergroupContact;
use App\Models\Meetups\UsergroupTag;
use App\Models\Meetups\UsergroupType;
use Illuminate\Console\Command;

class UsergroupImporter extends Command
{
    public $client;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:usergroups';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports the Usergroups provided by php.ug';

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
        $url = 'https://php.ug/api/rest/listtype/1';
        $usergroups = json_decode(file_get_contents($url));

        foreach ($usergroups->groups as $usergroup) {
            $localGroup = new Usergroup();

            $localGroup->create([
                'name' => $usergroup->name,
                'shortname' => $usergroup->shortname,
                'url' => $usergroup->url,
                'icalendar_url' => $usergroup->icalendar_url,
                'latitude' => $usergroup->latitude,
                'longitude' => $usergroup->longitude,
                'state' => $usergroup->state,
                'country' => $usergroup->country,
                'slug' => str_slug($usergroup->name, '_')
            ]);

            foreach ($usergroup->contacts as $contact) {
                $localContact = new UsergroupContact();

                $localContact->create([
                    'usergroup_id' => $usergroup->id,
                    'url' => $contact->url,
                    'name' => $contact->name,
                    'type' => $contact->type,
                    'icon' => $contact->cssClass
                ]);
            }

            foreach ($usergroup->tags as $tag) {
                $localTag = new UsergroupTag();

                $localTag->create([
                    'usergroup_id' => $usergroup->id,
                    'name' => $tag->name,
                    'description' => $tag->description
                ]);
            }
        }
    }
}
