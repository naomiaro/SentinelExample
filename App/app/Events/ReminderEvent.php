<?php

namespace App\Events;

use Cartalyst\Sentinel\Reminders\EloquentReminder as Reminder;
use App\User;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;

class ReminderEvent extends Event
{
    use SerializesModels;

    public $user;

    public $reminder;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Reminder $reminder)
    {
        $this->user = $user;
        $this->reminder = $reminder;
    }
}
