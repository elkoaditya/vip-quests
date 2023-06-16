<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TriggerRoot implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public string $nama;
    public string $jabatan, $panggilan;
    public function __construct($nama, $jabatan, $panggilan)
    {
        $this->jabatan = $jabatan;
        $this->nama = $nama;
        $this->panggilan = $panggilan;
    }
    public function broadcastWith():array {
        return [
            'nama' => $this->nama,
            'jabatan' => $this->jabatan,
            'panggilan' => $this->panggilan,
        ];
    }
    public function broadcastOn()
    {
        return new Channel('root');
    }
}
