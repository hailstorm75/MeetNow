<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventParticipant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventController extends Controller
{
    public function create(): Response
    {
        return response()->view('events.create');
    }

    public function join(string $id)
    {
        $userId = $this->getUser()->id;

        if (EventParticipant::where("participant_id", $userId)->exists()
        || Event::where('id', $id)->where('owner_id', $userId)->exists())
        {
            return redirect("/events/" . $id);
        }

        EventParticipant::create([
            "participant_id" => $userId,
            "event_id" => $id
        ]);

        return redirect("/events/" . $id);
    }

    public function store(Request $request)
    {
        $eventId = $this->newGuid();
        $userId = $this->getUser()->id;

        Event::create([
            'id' => $eventId,
            'owner_id' => $userId,
            'title' => $request->input('title'),
            'description' => $request->input('description') ?? ""
        ]);
        EventParticipant::create([
            "participant_id" => $userId,
            "event_id" => $eventId
        ]);

        return redirect("/dashboard");
    }

    public function edit(string $id)
    {
        $event = Event::where("id", $id)->first();

        return view('events.edit')->with('event', $event);
    }

    public function update(Request $request, string $id)
    {
        Event::where('id', $id)
            ->update([
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);

        return redirect('/dashboard');
    }

    public function destroy(string $id)
    {
        Event::find($id)->first()->delete();

        return redirect('/dashboard');
    }

    public function show(string $id)
    {
        $event = Event::where('id', $id)->first();

        return view('events.show')->with("event", $event);
    }

    private function newGuid(): string
    {
        return vsprintf('%s%s-%s-4000-8%.3s-%s%s%s0',str_split(dechex( microtime(true) * 1000 ) . bin2hex( random_bytes(8) ),4));
    }
}
