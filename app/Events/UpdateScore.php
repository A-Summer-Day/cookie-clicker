<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Score;

class UpdateScore implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $score;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Score $score)
    {
        $this->score = $score;
    }

    public function broadcastWith() {
        //return ['hello' => 'there'];
        return['score' => $this->score->current_score];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('channel');
    }

    public function broadcastAs()
    {
        return 'UpdateScore';
    }
}
