<?php

namespace App\Http\Controllers;

use App\Models\CalendarEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarEventController extends Controller
{
    public function index()
    {
        $events = CalendarEvent::where('user_id', Auth::id())
            ->orderBy('event_date')
            ->orderBy('event_time')
            ->get();

        return view('dashboard.calendar', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'event_time' => 'nullable',
            'type' => 'required|string|max:50',
        ]);

        CalendarEvent::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,
            'type' => $request->type,
        ]);

        return back()->with('success', 'Event added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'event_time' => 'nullable',
            'type' => 'required|string|max:50',
        ]);

        $event = CalendarEvent::where('user_id', Auth::id())
            ->findOrFail($id);

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,
            'type' => $request->type,
        ]);

        return back()->with('success', 'Event updated successfully!');
    }

    public function destroy($id)
    {
        $event = CalendarEvent::where('user_id', Auth::id())
            ->findOrFail($id);

        $event->delete();

        return back()->with('success', 'Event deleted successfully!');
    }
}