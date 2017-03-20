<?php

namespace App;

use App\Contracts\Pointable;
use App\Traits\Pointable as PointableTrait;
use App\Models\Users\Phpoint;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Laravel\Scout\Searchable;

class User extends Authenticatable implements Pointable
{
    use Notifiable, PointableTrait, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'avatar', 'profile_cover', 'email', 'github_id', 'slack_webhook_url', 'password', 'is_admin', 'lat', 'lng', 'address', 'city', 'country', 'company', 'intro', 'website', 'github_url', 'twitter_url', 'facebook_url', 'linkedin_url', 'email_token', 'affiliate_id', 'referred_by'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'slack_webhook_url', 'github_id',
    ];

    protected $casts = [
        'is_admin' => 'boolean'
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
        $referrals = User::where('referred_by', $this->affiliate_id)->get();

        return $referrals;
    }

}
