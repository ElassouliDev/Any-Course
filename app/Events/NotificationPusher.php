<?php

namespace App\Events;

use App\Course;
use App\User;
use Carbon\Carbon;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NotificationPusher implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $data;
    private $user;
    public function __construct($data ,$user)
    {
        $this->data = $data;
        $this->user = $user;
    }

    public function broadcastOn()
    {

        return ['my-channel'.$this->user->id];
    }

    public function broadcastAs()
    {
        return 'my-event2';
    }
}
