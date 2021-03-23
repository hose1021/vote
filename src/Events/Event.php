<?php

namespace Hose1021\Vote\Events;

use Illuminate\Database\Eloquent\Model;

class Event
{
    /**
     * @var Model
     */
    public Model $vote;

    /**
     * Event constructor.
     *
     * @param Model $vote
     */
    public function __construct(Model $vote)
    {
        $this->vote = $vote;
    }
}
