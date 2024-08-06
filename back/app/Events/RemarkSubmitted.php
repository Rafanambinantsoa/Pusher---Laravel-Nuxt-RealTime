<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RemarkSubmitted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $remark;
    /**
     * Create a new event instance.
     */
    public function __construct($remark)
    {
         $this->remark = $remark;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return  ['my-channel'];
    }
    public function broadcastAs(){
        return 'my-event';
    }
}
