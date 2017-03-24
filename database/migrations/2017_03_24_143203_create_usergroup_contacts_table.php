<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsergroupContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usergroup_contacts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('usergroup_id')->unsigned();
            $table->string('url')->nullable();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('icon')->nullable();

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
        Schema::dropIfExists('usergroup_contacts');
    }
}
