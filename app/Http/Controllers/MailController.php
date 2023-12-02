<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestingMail;
use Illuminate\Support\Facades\Mail;

use Webklex\IMAP\Facades\Client;

class MailController extends Controller
{
    public function sendEmail()
    {
        $mail = New TestingMail();
        $email = 'mdnayan7898@gmail.com';
        $subject = "Love Message";
        $message = "This is message.";
        $from = "password@ictknowledgebd.org";
        $name = "Laravel Mail Testing";

        Mail::to($email)
        ->cc('sharmilarisha98@gmail.com')
        ->bcc('sharmilarisha98@gmail.com')
        ->send($mail->setSubject($subject));

        return 'Email sent successfully!';
    }

    public function showMail(){
                // Connect to the "inbox" mailer defined in the config
                $client = Client::account('default');

                // Connect to the mail server
                $client->connect();
        
                // Get all messages in the inbox
                $messages = $client->getFolder('INBOX')->messages()->all();
        
                // Close the connection
                $client->expunge();
                $client->disconnect();
        
                // Display the messages
                return view('inbox.index', compact('messages'));
    }
}
