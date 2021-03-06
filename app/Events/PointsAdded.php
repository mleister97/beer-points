<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Bus\Queueable;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PointsAdded implements ShouldBroadcast, ShouldQueue
{
    use Dispatchable, InteractsWithSockets, Queueable, SerializesModels;

    public $team_id;
    public $points;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($team_id, $points)
    {
        $this->team_id = $team_id;
        $this->points = $points;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['points'];
    }

    public function broadcastAs()
    {
        return 'points-added';
    }
}
