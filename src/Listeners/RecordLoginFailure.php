<?php

namespace Suth\LaravelSift\Listeners;

use Illuminate\Auth\Events\Failed;

class RecordLoginFailure extends RecordAuthAction
{
    /**
     * Handle the event.
     *
     * @param  Illuminate\Auth\Events\Failed $event
     * @return void
     */
    public function handle(Failed $event)
    {
        $sift = $this->sift;

        $this->track('$login', [
            '$user_id' => $sift->getUserId($event->user),
            '$session_id' => $sift::getSessionId($this->session),
            '$login_status' => '$failure'
        ]);
    }
}
