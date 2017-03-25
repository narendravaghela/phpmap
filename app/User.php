<?php

namespace App;

use App\Contracts\Pointable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Traits\Pointable as PointableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements Pointable
{
    use Notifiable, PointableTrait, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'avatar', 'profile_cover', 'email', 'github_id', 'slack_webhook_url', 'password', 'is_admin', 'lat', 'lng', 'address', 'city', 'country', 'company', 'intro', 'website', 'github_url', 'twitter_url', 'facebook_url', 'linkedin_url', 'email_token', 'affiliate_id', 'referred_by', 'is_verified',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'slack_webhook_url', 'github_id', 'affiliate_id', 'referred_by',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
        'is_verified' => 'boolean',
    ];

    public function routeNotificationForMail()
    {
        return $this->email;
    }

    public function routeNotificationForSlack()
    {
        return $this->slack_webhook_url;
    }

    public function referrals()
    {
        $referrals = self::where('referred_by', $this->affiliate_id)->get();

        return $referrals;
    }
}
