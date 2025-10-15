<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\EmailTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email_templates = array(
            array('slug' => 'test-mail','type' => 'Test Mail','subject' => 'Test Mail','body' => '<p style="text-align:center;">{{logo}}</p><p>Hey! This is a test mail from {{site_name}}.</p><p>This is a test email to confirm the successful delivery of messages from our system. No action is required on your part. If you have received this email, it indicates that our email service is functioning correctly. Should you encounter any issues or have any concerns.</p><p>Thanks for using our application.</p><p style="text-align:center;">© Copyright {{current_year}}, All Rights Reserved By {{site_name}}</p>','variables_info' => '[{"name":"logo","description":"Site Logo"},{"name":"site_name","description":"Site Name"},{"name":"current_year","description":"Current Year"}]','status' => '1','last_edit_by' => '1','created_at' => '2025-03-07 08:24:58','updated_at' => '2025-03-17 05:29:46'),
            array('slug' => 'new-admin-credential','type' => 'New Admin Credential','subject' => 'Login Credentials','body' => '<p style="text-align:center;">{{logo}}</p><p>Hello {{firstname}}</p><p>Here is your login credentials.</p><p>Username &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : {{username}}</p><p>Email &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : {{email}}</p><p>Password &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: {{password}}</p><p>Role &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: {{role}}</p><p>Thanks for using our application.</p><p style="text-align:center;">© Copyright {{current_year}}, All Rights Reserved By {{site_name}}</p>','variables_info' => '[{"name":"logo","description":"Site Logo"},{"name":"firstname","description":"User Firstname"},{"name":"username","description":"User Username"},{"name":"email","description":"User Email"},{"name":"password","description":"User Password"},{"name":"role","description":"Role"},{"name":"current_year","description":"Current Year"},{"name":"site_name","description":"Site Name"}]','status' => '1','last_edit_by' => '1','created_at' => '2025-03-07 09:48:28','updated_at' => '2025-03-17 05:29:06'),
            array('slug' => 'email-verification','type' => 'Email Verification','subject' => 'Account Authorization','body' => '<p style="text-align:center;">{{logo}}</p><p>Hello {{fullname}}!</p><p>Need to verify your account before access your dashboard.</p><p>Your verification code : {{code}}</p><p>Thanks for using our application.</p><p style="text-align:center;">© Copyright {{current_year}}, All Rights Reserved By {{site_name}}</p>','variables_info' => '[{"name":"logo","description":"Site Logo"},{"name":"fullname","description":"User Fullname"},{"name":"code","description":"Verification OTP Code"},{"name":"site_name","description":"Site Name"},{"name":"current_year","description":"Current Year"}]','status' => '1','last_edit_by' => '1','created_at' => '2025-03-12 08:34:11','updated_at' => '2025-03-17 05:21:09'),
            array('slug' => 'password-reset','type' => 'Password Reset','subject' => 'Verification Code (Password Reset)','body' => '<p style="text-align:center;">{{logo}}</p><p>Hello {{fullname}}!</p><p>You trying to reset your password.</p><p>Here is your OTP : {{code}}</p><p>Thanks for using our application.</p><p style="text-align:center;">© Copyright {{current_year}}, All Rights Reserved By {{site_name}}</p>','variables_info' => '[{"name":"logo","description":"Site Logo"},{"name":"fullname","description":"User Fullname"},{"name":"code","description":"Verification OTP Code"},{"name":"site_name","description":"Site Name"},{"name":"current_year","description":"Current Year"}]','status' => '1','last_edit_by' => '1','created_at' => '2025-03-17 08:22:46','updated_at' => '2025-03-17 08:22:46'),
            array('slug' => 'email-to-all-admin','type' => 'Email To All Admin','subject' => 'Email To All Admin','body' => '<p style="text-align:center;">{{logo}}</p><p>Hey {{firstname}}</p><p>{{message}}</p><p>Thanks for using our application.</p><p style="text-align:center;">© Copyright {{current_year}}, All Rights Reserved By {{site_name}}</p>','variables_info' => '[{"name":"logo","description":"Site Logo"},{"name":"firstname","description":"User Firstname"},{"name":"message","description":"Message"},{"name":"site_name","description":"Site Name"},{"name":"current_year","description":"Current Year"}]','status' => '1','last_edit_by' => '1','created_at' => '2025-03-17 09:10:09','updated_at' => '2025-03-17 09:20:53')
        );

        EmailTemplate::insert($email_templates);
    }
}
