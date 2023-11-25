<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TrackVivinoParseEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $action;

    /**
     * Create a new event instance.
     */
    public function __construct($action)
    {
        $this->action = $action;
    }


    public function broadcastOn(): Channel
    {
        return new Channel('vivino');
    }
}
