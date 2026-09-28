<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    // Show all announcements
    public function index()
    {
        $announcements = Announcement::latest()->get();

        return view('admin.announcements', compact('announcements'));
    }

    // Store announcement
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Announcement::create([
            'title' => $validated['title'],
            'message' => $validated['message'],
        ]);

        return redirect()
            ->route('admin.announcements')
            ->with('success', 'Announcement added successfully!');
    }

    // Show edit page
    public function edit(Announcement $announcement)
    {
        return view(
            'admin.announcements.edit',
            compact('announcement')
        );
    }

    // Update announcement
    public function update(Request $request, Announcement $announcement)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $announcement->update([
            'title' => $validated['title'],
            'message' => $validated['message'],
        ]);

        return redirect()
            ->route('admin.announcements')
            ->with('success', 'Announcement updated successfully!');
    }

    // Delete announcement
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()
            ->route('admin.announcements')
            ->with('success', 'Announcement deleted successfully!');
    }
}