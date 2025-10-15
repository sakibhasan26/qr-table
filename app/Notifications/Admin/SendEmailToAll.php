<?php

namespace App\Notifications\Admin;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Support\HtmlString;
use App\Models\Admin\EmailTemplate;
use App\Constants\EmailTemplateConst;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Providers\Admin\BasicSettingsProvider;
use Illuminate\Notifications\Messages\MailMessage;

class SendEmailToAll extends Notification
{
    use Queueable;

    protected $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $message)
    {
        $this->message = $message;
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
        $subject            = $this->message['subject'];
        $message            = $this->message['message'];
        $firstname          = $notifiable->firstname;
        $basic_settings     = BasicSettingsProvider::get();
        $email_template     = EmailTemplate::where('slug',EmailTemplateConst::EMAIL_TO_ALL_ADMIN)->first();

        if(!$email_template) return back()->with(['error' => ['Sorry! Email Template Not Found.']]);
        $logo_path = get_logo($basic_settings);

        $logo_img_tag = '<img src="' . $logo_path . '" alt="Logo" style="max-width:150px; width:auto; height:auto;"/>';

        $email_body = Str::replace(
            ['{{logo}}', '{{site_name}}', '{{current_year}}','{{firstname}}','{{message}}'],
            [
                $logo_img_tag,
                $basic_settings->site_name,
                Carbon::now()->year,
                $firstname,
                $message
            ],
            $email_template->body
        );



        return (new MailMessage)
            ->subject($subject)
            ->view('send-email.test-mail', [
                'email_body' => $email_body
            ]);
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
