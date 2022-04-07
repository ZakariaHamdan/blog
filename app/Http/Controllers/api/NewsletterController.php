<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\Newsletter;
use function redirect;
use function request;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate([
            'email' => 'required|email'
        ]);

        try {
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {

            throw ValidationException::withMessages([
                'email' => 'This email is not real bruh!'
            ]);
        }
        return redirect('/')
            ->with('success', 'Signed up to the newsletters successful.');
    }
}
