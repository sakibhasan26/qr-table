<?php

namespace App\Notifications\User\Auth;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use App\Models\Admin\EmailTemplate;
use App\Constants\EmailTemplateConst;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Providers\Admin\BasicSettingsProvider;
use Illuminate\Notifications\Messages\MailMessage;

class SendAuthorizationCode extends Notification
{
    use Queueable;

    protected $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
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
        $fullname           = $notifiable->fullname;
        $data               = $this->data;
        $basic_settings     = BasicSettingsProvider::get();
        $email_template     = EmailTemplate::where('slug',EmailTemplateConst::EMAIL_VERIFICATION)->first();

        if(!$email_template) return back()->with(['error' => ['Sorry! Email Template Not Found.']]);
        $logo_path = get_logo($basic_settings);

        $logo_img_tag = '<img src="' . $logo_path . '" alt="Logo" style="max-width:150px; width:auto; height:auto;"/>';

        $email_body = Str::replace(
            ['{{logo}}','{{fullname}}','{{code}}','{{current_year}}','{{site_name}}',],
            [
                $logo_img_tag,
                $fullname,
                $data->code,
                Carbon::now()->year,
                $basic_settings->site_name,
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
