<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsergroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usergroups', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('shortname')->nullable();
            $table->string('url')->nullable();
            $table->string('icalendar_url')->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->integer('state')->unsigned();
            $table->string('country');
            $table->string('slug');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usergroups');
    }
}
