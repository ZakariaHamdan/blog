<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
