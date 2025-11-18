<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Python executable from .env or fallback to venv
        $pythonExe = env('PYTHON_EXE', 'C:\Users\Ricardo\yolo5_api\venv\Scripts\python.exe');

        // Path to diagnostic.py
        $pythonPath = 'C:\Users\Ricardo\email_phishing\laravel_phishing_api\diagnostic.py';
        if (! file_exists($pythonPath)) {
            return response()->json([
                'error' => 'diagnostic.py not found at expected path.',
                'expected_path' => $pythonPath
            ], 500);
        }

        // Build command
        $command = "\"{$pythonExe}\" \"{$pythonPath}\"";

        // Pass empty env (or you can include SMTP vars if you want)
        $env = [
            // 'SMTP_HOST' => env('SMTP_HOST', 'smtp.gmail.com'),
            'SMTP_HOST' => '173.194.174.109', // temp test only

            'SMTP_PORT' => env('SMTP_PORT', '587'),
            'SMTP_USER' => env('SMTP_USER'),
            'SMTP_PASS' => env('SMTP_PASS'),
            'EMAIL_RECIPIENT' => $request->input('recipient', ''),
            'EMAIL_SUBJECT' => $request->input('subject', ''),
            'EMAIL_LINK' => $request->input('link', ''),
        ];

        // Prepare process
        $descriptorSpec = [
            0 => ['pipe', 'r'],
            1 => ['pipe', 'w'],
            2 => ['pipe', 'w'],
        ];
        $pipes = [];

        try {
            $process = proc_open($command, $descriptorSpec, $pipes, base_path(), $env);
            if (! is_resource($process)) {
                throw new \Exception('Could not start Python process');
            }

            stream_set_blocking($pipes[1], true);
            stream_set_blocking($pipes[2], true);

            $stdout = stream_get_contents($pipes[1]);
            $stderr = stream_get_contents($pipes[2]);

            fclose($pipes[0]);
            fclose($pipes[1]);
            fclose($pipes[2]);

            $returnCode = proc_close($process);

            return response()->json([
                'command' => $command,
                'returnCode' => $returnCode,
                'stdout' => $stdout,
                'stderr' => $stderr,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'command' => $command
            ], 500);
        }
    }
}
