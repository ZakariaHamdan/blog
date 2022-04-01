<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(String $email , string $list = null){

        $list ??= config('services.mailchimp.lists.subscribers');

        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us14'
        ]);

        return $response = $mailchimp->lists->addListMember(config('services.mailchimp.lists.subscribers'), [
            'email_address' => request('email'),
            'status' => 'subscribed'
        ]);

    }
}
