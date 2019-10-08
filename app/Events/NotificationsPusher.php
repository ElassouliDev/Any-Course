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

class NotificationsPusher implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $data;

    public function __construct($data)
    {
        $this->data = [
            'message_en' =>$data->message_en,
            'message_ar' => $data->message_ar,
            'url_en' => $data->url_en,
            'url_ar' => $data->url_ar,
            'title_en' => $data->title_en,
            'title_ar' => $data->title_ar,
            'user_id'=>auth()->user()->id,
            'created_at'=>$data->created_at ,
        ];
    }

    public function broadcastOn()
    {
        return ['my-channel'];
    }

    public function broadcastAs()
    {
        return 'my-event';
    }
}
