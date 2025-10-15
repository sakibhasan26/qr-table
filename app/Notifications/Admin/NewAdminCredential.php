<?php

namespace App\Notifications\Admin;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use App\Models\Admin\EmailTemplate;
use App\Constants\EmailTemplateConst;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Providers\Admin\BasicSettingsProvider;
use Illuminate\Notifications\Messages\MailMessage;

class NewAdminCredential extends Notification 
{
    use Queueable;

    protected $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $data)
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
        $basic_settings     = BasicSettingsProvider::get();
        $data               = $this->data;
        $email_template     = EmailTemplate::where('slug',EmailTemplateConst::NEW_ADMIN_CREDENTIAL)->first();

        if(!$email_template) return back()->with(['error' => ['Sorry! Email Template Not Found.']]);
        $logo_path = get_logo($basic_settings);

        $logo_img_tag = '<img src="' . $logo_path . '" alt="Logo" style="max-width:150px; width:auto; height:auto;"/>';

        $email_body = Str::replace(
            ['{{logo}}','{{firstname}}','{{username}}','{{email}}','{{password}}','{{role}}','{{current_year}}','{{site_name}}',],
            [
                $logo_img_tag,
                $data['firstname'],
                $data['username'],
                $data['email'],
                $data['password'],
                $data['role'],
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
