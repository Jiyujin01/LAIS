<?php

namespace App\Http\Controllers\App\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $event = Event::all();

        return view('app.admin.events.index', compact('event'));
    }

    public function create()
    {
        return view('app.admin.events.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:4|max:255|unique:events',
            'date' => 'required|date'
        ]);

        $event = Event::create($data);

        return redirect()->route('app.admin.events.index')->with('status', 'Event has been successfully added!');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('app.admin.events.index')->with('status', 'Event has been successfully deleted!');
    }


    public function modify(Event $event)
    {
        return view('app.admin.events.modify', compact('Event'));
    }

    
    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'name' => 'required|min:4|max:255|unique:events,name,' . $event->id,
            'date' => 'required|date'
        ]);

        $event->update($data);

        return redirect()->route('app.admin.events.index')->with('status', 'Event has been successfully updated!');
    }
}
