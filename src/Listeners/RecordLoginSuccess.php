<?php

namespace Suth\LaravelSift\Listeners;

use Illuminate\Auth\Events\Login;

class RecordLoginSuccess extends RecordLoginAction
{
    /**
     * Handle the event.
     *
     * @param  Illuminate\Auth\Events\Login $event
     * @return void
     */
    public function handle(Login $event)
    {
        $this->client->track('$login', [
            '$user_id' => $event->user->getKey(),
            '$session_id' => $this->request->session()->get('sift_session_id'),
            '$login_status' => '$success'
        ]);
    }
}
