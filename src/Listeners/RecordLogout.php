<?php

namespace Suth\LaravelSift\Listeners;

use Illuminate\Auth\Events\Logout;

class RecordLogout extends RecordAuthAction
{
    /**
     * Handle the event.
     *
     * @param  Illuminate\Auth\Events\Logout $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $this->sift->client->track('$logout', [
            '$user_id' => $event->user->email,
        ]);
    }
}
