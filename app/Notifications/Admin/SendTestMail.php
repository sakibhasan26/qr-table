<?php

namespace App\Notifications\Admin;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use App\Models\Admin\EmailTemplate;
use App\Constants\EmailTemplateConst;
use Illuminate\Notifications\Notification;
use App\Providers\Admin\BasicSettingsProvider;
use Illuminate\Notifications\Messages\MailMessage;

class SendTestMail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $basic_settings     = BasicSettingsProvider::get();
        $email_template     = EmailTemplate::where('slug',EmailTemplateConst::TEST_MAIL)->first();

        if(!$email_template) return back()->with(['error' => ['Sorry! Email Template Not Found.']]);
        $logo_path = get_logo($basic_settings);

        $logo_img_tag = '<img src="' . $logo_path . '" alt="Logo" style="max-width:150px; width:auto; height:auto;"/>';

        $email_body = Str::replace(
            ['{{logo}}', '{{site_name}}', '{{current_year}}'],
            [
                $logo_img_tag,
                $basic_settings->site_name,
                Carbon::now()->year
            ],
            $email_template->body
        );

        return (new MailMessage)
            ->subject($email_template->subject)
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
