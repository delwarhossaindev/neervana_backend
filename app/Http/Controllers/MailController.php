<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Exception;

class MailController extends Controller
{
    //

    public function send_mail(Request $request)
    {
        $details = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
            'subject' => 'required|string',
        ]);

        try {
            Mail::to($details['email'])->send(new ContactMail($details));
            return response()->json(['message' => 'Email sent successfully.'], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to send email.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
