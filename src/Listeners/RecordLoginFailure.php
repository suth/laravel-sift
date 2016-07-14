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
        $this->sift->client()->track('$login', [
            '$user_id' => $this->sift->getUserId($event->user),
            '$session_id' => $this->request->session()->get('sift_session_id'),
            '$login_status' => '$failure'
        ]);
    }
}
