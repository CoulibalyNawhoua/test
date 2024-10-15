<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoicePaid extends Notification
{
    use Queueable;

    protected $publication;

    /**
     * Create a new notification instance.
     */

     public function __construct($publication)
    {
        $this->publication = $publication;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/detail-pub/'.$this->publication->id);

        return (new MailMessage)
       ->subject('Nouvelle publication ajoutée')
                    ->line('Une nouvelle publication a été ajoutée sur notre site.')
                    ->action('Voir la publication', $url)
                    ->line('Merci de votre intérêt pour notre site.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
