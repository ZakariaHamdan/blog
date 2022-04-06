<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(String $email , string $list = null){

        $list ??= config('services.mailchimp.lists.subscribers');

        return $this->client()->lists->addListMember(config('services.mailchimp.lists.subscribers'), [
            'email_address' => request('email'),
            'status' => 'subscribed'
        ]);
    }

    protected  function client(){

        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us14'
        ]);
    }
}
