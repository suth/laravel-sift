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
        $this->sift->client()->track('$login', [
            '$user_id' => $event->user->email,
            '$session_id' => $this->request->session()->get('sift_session_id'),
            '$login_status' => '$success'
        ]);
    }
}
