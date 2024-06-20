<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Module;
use Illuminate\Support\Facades\Log;

class ModuleStatusChanged
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $module;

    /**
     * Create a new event instance.
     */
    public function __construct(Module $module)
    {
        $this->module = $module;
        Log::info("ModuleStatusChanged event");
        Log::info($this->module);
        Log::info("ModuleStatusChanged fin");
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
         /* return [
            new PrivateChannel('module-status'),
        ]; */
        return new Channel('module-status');
    }

    /* public function broadcastAs()
    {
        return 'module.status.changed';
    } */
}
