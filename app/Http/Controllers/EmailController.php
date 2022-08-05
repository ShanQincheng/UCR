<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{

    public function sendEmail(Request $request)
    {
        // receive email destination address, email subject and email content
        // then send email
        $addressToSend = $request->input('email', null);
        $emailSubject = $request->input('subject', null);
        $emailContent = $request->input('content', null);

        // echo "This is the body of the email" | mail -s "This is the subject line"
        //youremailaddress@yahoo.com

        $command = 'echo "' . $emailContent . '" | mail -s "' . $emailSubject . '" ' . $addressToSend;
        $output = system($command, $retval);

        return view('email.send', [
            'sentInfo' => 'Email sent successfully'. $output,
        ]);
    }
}
