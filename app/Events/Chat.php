<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Chat implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $data = "";
    public $userID;
    public $chatID = "room";
    /**
     * Create a new event instance.
     */
    public function __construct($data, $user_id, $chat_id = "room")
    {
        //
        $this->data = $data;
        $this->userID = $user_id;
        $this->chatID = $chat_id;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('chat-channel'),
        ];
    }

    public function broadcastAs(): string {
        return "chat.$this->chatID";//name of the broadcasr
    }

    public function broadcastWith(){
        return [
            "data" => $this->data,
            "send_id" => $this->userID,
            "chat_id"  => $this->chatID
        ];
    }
}
