<?php

namespace App\Listeners;

use App\Events\SomeOneCheckedProfile;
use App\Jobs\SendProfileCheckedMailJob;

class SendProfileCheckedNotification {
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SomeOneCheckedProfile  $event
     * @return void
     */
    public function handle( SomeOneCheckedProfile $event ) {
        SendProfileCheckedMailJob::dispatch( $event->user )
            ->delay( now()->addSeconds( 5 ) );
    }
}
