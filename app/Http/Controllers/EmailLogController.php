<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailLog;

class EmailLogController extends Controller
{
    public function store(Request $request)
    {
        EmailLog::create([
            'email' => $request->email,
            'event' => $request->event,
            'ip' => $request->ip(),
            'user_agent' => $request->header('User-Agent')
        ]);

        return response()->json(['message' => 'Log saved'], 200);
    }


    //for dashboard view
    public function index(Request $request)
    {
        $query = EmailLog::query();

        // Optional search
        if ($request->search) {
            $query->where('email', 'LIKE', "%{$request->search}%");
        }

        // Optional filter by event
        if ($request->event) {
            $query->where('event', $request->event);
        }

        $logs = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('email_logs.index', compact('logs'));
        // return redirect()->route('changed-password');
    }

}
