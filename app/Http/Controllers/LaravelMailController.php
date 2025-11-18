<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LaravelMailController extends Controller
{
    // public function send(Request $request)
    // {
    //     $data = $request->validate([
    //         'recipient' => 'required|email',
    //         'subject' => 'required|string|max:255',
    //         'link' => 'required|url',
    //     ]);

    //     $html = "<p>Hello,</p>
    //              <p>Click the button below:</p>
    //              <p><a href=\"{$data['link']}\" style=\"display:inline-block;padding:10px 16px;background:#1a73e8;color:#fff;text-decoration:none;border-radius:6px;\">Open sample site</a></p>";

    //     try {
    //         Mail::send([], [], function ($message) use ($data, $html) {
    //             $message->to($data['recipient'])
    //                 ->subject($data['subject'])
    //                 ->setBody($html, 'text/html')
    //                 ->from(config('mail.from.address'), config('mail.from.name'));
    //         });

    //         return response()->json(['status' => 'success', 'message' => 'Email sent']);
    //     } catch (\Exception $e) {
    //         \Log::error('Mail send error', ['exception' => $e]);
    //         return response()->json([
    //             'status' => 'failed',
    //             'error' => $e->getMessage(),
    //             'trace' => $e->getTraceAsString()
    //         ], 500);
    //     }

    // }

    public function send(Request $request)
    {
        $data = $request->validate([
            'recipient' => 'required|email',
            'subject' => 'required|string|max:255',
            'link' => 'required|url',
        ]);

        // temporarily skip email sending
        return response()->json([
            'status' => 'success',
            'message' => 'Controller works, no email sent yet',
            'data' => $data
        ]);
    }
}
