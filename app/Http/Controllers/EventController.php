<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Event;
use App\Models\EventParticipant;
use DateTime;
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

    /**
     * @throws \JsonException
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $eventId = $this->newGuid();
        $userId = $this->getUser()->id;

        Event::create([
            'id' => $eventId,
            'owner_id' => $userId,
            'title' => $request->input('title'),
            'description' => $request->input('description') ?? ""
        ])->save();
        EventParticipant::create([
            "participant_id" => $userId,
            "event_id" => $eventId
        ])->save();

        $dates = json_decode($request->input('dates'));
        foreach ($dates as $date) {
            Date::create([
                "event_id" => $eventId,
                "datetime" => new DateTime($date->date . " " . $date->time)
            ])->save();
        }

        return redirect("/dashboard");
    }

    public function edit(string $id)
    {
        $event = Event::where("id", $id)->first();
        $dates = Date::where("event_id", $id)->get();

        return view('events.edit')->with([
            'event' => $event,
            'dates' => $dates,
        ]);
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
        $dates = Date::where("event_id", $id)->get();
        $participants = EventParticipant::where("event_id", $id)
            ->leftJoin("participant_availables", "participant_availables.participant_id", "=", "event_participants.participant_id")
            ->leftJoin("users", "users.id", "=", "event_participants.participant_id")
            ->orderBy("users.id")
            ->select("users.name AS name", "participant_availables.state AS state", "participant_availables.date_id AS date_id")
            ->get();

        return view('events.show')->with([
            "event" => $event,
            "dates" => $dates,
            "participants" => $participants
        ]);
    }

    private function newGuid(): string
    {
        return vsprintf('%s%s-%s-4000-8%.3s-%s%s%s0',str_split(dechex( microtime(true) * 1000 ) . bin2hex( random_bytes(8) ),4));
    }
}
