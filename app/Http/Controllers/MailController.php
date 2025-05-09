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
            'name' => 'nullable|string',
            'email' => 'nullable|email',
            'message' => 'nullable|string',
            'subject' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        try {
            Mail::to('admin@neervana.org')->send(new ContactMail($details));
            return response()->json(['message' => 'Email sent successfully.'], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to send email.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
