<?php

namespace App\Notifications;

use Illuminate\Support\Facades\Auth;
use Illuminate\Bus\Queueable;
use App\Models\LeaveApplication;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AddNewCongeNotification extends Notification
{
    use Queueable;
private $LeaveApplication;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(LeaveApplication $LeaveApplication)
    {
       $this->LeaveApplication = $LeaveApplication ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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

     public function toDatabase($notifiable)
    {
        return [
            //'data' => $this->details['body']

                  'id'=>$this->LeaveApplication->id,

                  'Title'=>'Demande de congé deposé par :',
                 'use'=>Auth::user()->name, 

        ];
    }



}
