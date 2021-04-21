<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventController extends Controller
{
    public function create(): Response
    {
        return response()->view('events.create');
    }

    public function store(Request $request)
    {
        Event::create([
            'id' => $this->newGuid(),
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);

        return redirect("/dashboard");
    }

    public function edit(string $id)
    {
        $event = Event::find($id)->first();

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

    public function show($id): Response
    {

    }

    private function newGuid(): string
    {
        return vsprintf('%s%s-%s-4000-8%.3s-%s%s%s0',str_split(dechex( microtime(true) * 1000 ) . bin2hex( random_bytes(8) ),4));
    }
}
