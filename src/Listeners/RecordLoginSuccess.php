<?php

namespace Suth\LaravelSift\Listeners;

use Illuminate\Auth\Events\Login;

class RecordLoginSuccess extends RecordAuthAction
{
    /**
     * Handle the event.
     *
     * @param  Illuminate\Auth\Events\Login $event
     * @return void
     */
    public function handle(Login $event)
    {
        $sift = $this->sift;

        $this->track('$login', [
            '$user_id' => $sift->getUserId($event->user),
            '$session_id' => $sift::getSessionId($this->session),
            '$login_status' => '$success'
        ]);
    }
}
