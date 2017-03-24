<?php

namespace App\Notifications\Importers;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MigrationPasswordNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var User
     */
    public $user;

    /**
     * Create a new notification instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Please Update your password')
                    ->greeting('Hey '.$this->user->username)
                    ->line('We´ve relaunched our site recently and migrated all existing users.')
                    ->line('In order to providing more security, it is strongly recommended to update your password.')
                    ->line('Your recent password has been reset to "'.'pwd_'.str_slug($this->user->username, '_').'_UPDATE'.'".')
                    ->action('Update Password', url('/account/password'))
                    ->line('Thank you for using PHPMap!')
                    ->salutation('Florian');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
