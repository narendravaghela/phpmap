<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('username')->unique();
            $table->string('avatar')->default('/images/profile_image.png');
            $table->string('profile_cover')->default('/images/profile_cover.jpg');
            $table->string('email')->unique();

            $table->string('slack_webhook_url')->nullable();

            $table->string('password')->nullable();

            $table->boolean('is_admin')->default('0');
            $table->boolean('is_verified')->default('0');

            $table->string('github_id')->unique()->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('company')->nullable();
            $table->string('website')->nullable();
            $table->string('github_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->longText('intro')->nullable();

            $table->string('job_title')->nullable();

            $table->string('referred_by')->nullable();
            $table->string('affiliate_id')->unique();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
