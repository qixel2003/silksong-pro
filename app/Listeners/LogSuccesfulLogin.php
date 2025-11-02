<?php
namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Models\LoginLog;

class LogSuccesfulLogin
{
    public function handle(Login $event): void
    {
        // Prevent duplicate logs within the same minute (optional)
        $alreadyLogged = LoginLog::where('user_id', $event->user->id)
            ->where('logged_in_at', '>=', now()->subMinute())
            ->exists();

        if (! $alreadyLogged) {
            LoginLog::create([
                'user_id' => $event->user->id,
                'logged_in_at' => now(),
            ]);
        }
    }
}

