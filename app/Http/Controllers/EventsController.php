<?php

namespace App\Http\Controllers;

use App\Models\EventParticipant;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function create()
    {

    }

    public function edit(string $id)
    {

    }

    public function destroy(string $id)
    {

    }

    public function join(string $id)
    {
        $paricipant = new EventParticipant;
        $paricipant->event = $id;
        $paricipant->participant = $this->getUser()->getId();

        $paricipant->save();
    }
}
