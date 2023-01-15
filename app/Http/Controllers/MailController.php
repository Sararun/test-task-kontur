<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPostRequest;
use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;

class MailController extends Controller
{
    public function index(UserPostRequest $request)
    {
        $data = [
            'subject' => 'пришло письмо',
            'body' => $request,
        ];

    }
}
